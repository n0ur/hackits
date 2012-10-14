<?

///////////////////////////////////////////////////////////////////////////////////
// 888    888        d8888  .d8888b.  888    d8P  8888888 88888888888 .d8888b.   //
// 888    888       d88888 d88P  Y88b 888   d8P     888       888    d88P  Y88b  //
// 888    888      d88P888 888    888 888  d8P      888       888    Y88b.       //
// 8888888888     d88P 888 888        888d88K       888       888     "Y888b.    //
// 888    888    d88P  888 888        8888888b      888       888        "Y88b.  //
// 888    888   d88P   888 888    888 888  Y88b     888       888          "888  //
// 888    888  d8888888888 Y88b  d88P 888   Y88b    888       888    Y88b  d88P  //
// 888    888 d88P     888  "Y8888P"  888    Y88b 8888888     888     "Y8888P"   //
///////////////////////////////////////////////////////////////////////////////////
//                                                                               //
// File:        challenges/check.php                                             //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: verify and handle submitted solution for a challenge             //
//                                                                               //
// Input:       id          Integer identifying the challenge                    //
// Input:       answer      Answer filled in the form by the user                //
// Input:       hash        SHA512 hash auto-submitted by reaching a page        //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../settings.php");

$debug = 0;
$failtext = "<p>Fail!</p>";
$successtext = "<p>Success!</p>";

// html header
?>
<html>
<head>
	<title>Challenge Results</title>
</head>
<body>
<?

// die quickly when getting odd input
$unsanitized_id = $_GET['id'];
$unsanitized_answer = $_GET['answer'];
$unsanitized_hash = $_GET['hash'];
if( !isset($unsanitized_id) || !is_numeric($unsanitized_id) || $unsanitized_id<$minchallengeid || $unsanitized_id>$maxchallengeid )
	die("Invalid challenge id! If you've reached this place without messing with the URL, tell staff about it!");
if( isset($unsanitized_answer) && isset($unsanitized_hash) )
	die("You can't submit both a hash and an answer! If you've reached this place without messing with the URL, tell staff about it!");
if( !isset($unsanitized_answer) && !isset($unsanitized_hash) )
	die("You must either submit a hash or an answer! If you've reached this place without messing with the URL, tell staff about it!");

// Include script that gathers the username from the SMF cookie. This script provides
// $loggedin 	 = 0 -> not logged in to SMF, 1 -> active SMF session
// $usernametext = the textual user name, for example Sling
// $usernameid   = the SMF id of the user, for example 2

require("../getsmfuser.php");

if(!$loggedin)
{
	die("<p>No active forum session found! Please log in to the Hackits forum, and submit again.</p>");
}

// Make read-only database connection
$dblink = mysql_connect($dbhost,$dbreaduser,$dbreadpass);
mysql_select_db($dbname);

// Sanitize variables
$challengeid = mysql_real_escape_string($unsanitized_id);
$answer = mysql_real_escape_string($unsanitized_answer);
$hash = mysql_real_escape_string($unsanitized_hash);

// Check for sanity of $challengeid variable
if(!isset($challengeid)||!is_numeric($challengeid)||$challengeid<$minchallengeid||$challengeid>$maxchallengeid)
	die("Invalid challenge id! If you've reached this place without messing with the URL, tell staff about it!");
if(mysql_num_rows(mysql_query("SELECT * FROM `hackits_challenges` WHERE `id`='".$challengeid."';"))==0)
	die("No challenge with this ID exists! If you've reached this place without messing with the URL, tell staff about it!");

// Check if user
// - hasn't already completed the challenge
// - hasn't unsuccesfully attempted it within the minimum retry period
$result = mysql_query("SELECT finished,lastattempt,penultimateattempt,lastsolution FROM `hackits_challengeresults` WHERE `challengeid`='".$challengeid."' AND `userid`='".$usernameid."';");
	$finished = mysql_result($result,0,0);
	$lastattempt = mysql_result($result,0,1);
	$penultimateattempt = mysql_result($result,0,2);
	$lastsolution = mysql_result($result,0,3);
$result = mysql_query("SELECT type,answer FROM `hackits_challenges` WHERE `id`='".$challengeid."';");
	$challengetype = mysql_result($result,0,0);
	$challengeanswer = mysql_result($result,0,1);

$currenttime = time();

if($finished>0)
{
	die("<p>You have already solved this challenge!</p>");
}
else if($lastsolution!=""&&($lastsolution==$hash||$lastsolution==$answer))
{
	die($failtext);
}
else if(($challengetype==1 && $answer=="") || ($challengetype==2 && $hash==""))
{
	die("<p>Did you forget to fill in an answer?</p>");
}
else if($lastattempt>0 && $penultimateattempt > 0)
{
	// the allowed time between this attempt and the previous, depends on the rate of submitting,
	// and gets larger when users try to bruteforce stuff
	$interval = abs($lastattempt - $penultimateattempt);
	$allowedretrytimeout = round(300/($interval+1),0);
	if($debug) {
		echo "Now: ".date("H:i:s",$currenttime)."<br />";
		echo "Last: ".date("H:i:s",$lastattempt)."<br />";
		echo "Penultimate: ".date("H:i:s",$penultimateattempt)."<br />";
		echo "Time between last two tries: ".$interval."<br />";
		echo "Allowed time between now and last try: ".$allowedretrytimeout."<br />";
	}
	if(($currenttime - $lastattempt) < $allowedretrytimeout)
	{
		die("<p>This isn't a guessing game or bruteforce challenge, please wait longer between submissions! You can try again in ".abs(($currenttime - $lastattempt)-$allowedretrytimeout)." seconds.</p>");
	}
}

// All input sanitation is done now, input validation can begin.

// Make write-enabled MySQL connection
$dblink = mysql_connect($dbhost, $dbwriteuser, $dbwritepass);
mysql_select_db($dbname);

// If answer is correct
if(($challengetype==1 && ($answer==$challengeanswer)) || ($challengetype==2 && ($hash==$challengeanswer)))
{
	// increment number of completions for this challenge
	mysql_query("UPDATE hackits_challenges SET completed=completed+1 WHERE id='$challengeid';") or die(mysql_error());

	// update hackits_challengeresults table with results
	if($lastattempt>0)
	{
		mysql_query("UPDATE hackits_challengeresults SET finished='$currenttime',lastattempt='0',penultimateattempt='0',lastsolution='0' WHERE userid='$usernameid' AND challengeid='$challengeid';") or die(mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO hackits_challengeresults VALUES ('$usernameid', '$challengeid','$currenttime','0','0','0')") or die(mysql_error());
	}

	echo $successtext;
}
// If answer is false
else
{
	if($challengetype==1) $lastanswer = $answer;
	else if($challengetype==2) $lastanswer = $hash;

	if($lastattempt>0)
	{
		mysql_query("UPDATE hackits_challengeresults SET lastattempt='$currenttime',penultimateattempt='$lastattempt',lastsolution='$lastanswer' WHERE userid='$usernameid' AND challengeid='$challengeid';") or die(mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO hackits_challengeresults VALUES ('$usernameid', '$challengeid','0','$currenttime','0','$lastanswer')") or die(mysql_error());
	}

	echo $failtext;
}


?>
</body>
</html>