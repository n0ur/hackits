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
// File:        courses/examnhandler.php                                         //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Handler for course examn submissions                             //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../settings.php");
require("../getsmfuser.php");

// Make read-only database connection
$dblink = mysql_connect($dbhost,$dbreaduser,$dbreadpass);
mysql_select_db($dbname);

// Get current time and sanitized courseid
$courseid = mysql_real_escape_string($_GET['id']);
$currenttime = time();

// Check for sanity of $courseid variable
if(!isset($courseid)||!is_numeric($courseid)||$courseid<$mincourseid||$courseid>$maxcourseid) die("Invalid course id!");
if(mysql_num_rows(mysql_query("SELECT * FROM `hackits_courses` WHERE `id`='".$courseid."';"))==0) die("No course with this ID exists!");

// Check
// - if the user is logged in
// - hasn't already completed the examn
// - hasn't unsuccesfully attempted it within the minimum retry period
if(!$loggedin)
{	die("<p>You need to be logged in for this course to count! Please open a new browser tab and log in to the Hackits forum, and submit again.</p>"); }
$finished = mysql_result(mysql_query("SELECT finished,lastattempt FROM `hackits_courseresults` WHERE `courseid`='".$courseid."' AND `userid`='".$usernameid."';"),0,0);
$lastattempt = mysql_result(mysql_query("SELECT finished,lastattempt FROM `hackits_courseresults` WHERE `courseid`='".$courseid."' AND `userid`='".$usernameid."';"),0,1);
if($finished>0)
{	die("<p>You have already finished this course!</p>"); }
else if($lastattempt+$retrytimeout>$currenttime)
{ 	die("<p>You have already attempted this course in the past ".($retrytimeout/60)." minutes. Please have a break and go over the course and exercises again before attempting again!</p>"); }
else
{

/////////////////////////////////////////////////
// Here the actual exam result checking begins! /
/////////////////////////////////////////////////

	// Get the solution of the current course (in the form of "abbaacddeabbdae...")
	$solution = str_split(mysql_result(mysql_query("SELECT solution FROM `hackits_courses` WHERE `id`='".$courseid."';"),0,0));

	// Construct a similar string from the form contents
	foreach($_POST as $question => $answer) { $answers .= $answer; }
	$answers = str_split(strtolower($answers));

	// Check if the correct number of answers were submitted
	if(count($answers)!=count($solution))
	{	echo "<p>Looks like you didn't answer all the questions, please check again!</p>"; }
	else
	{
		// Calculate percentage of correct answers and show either success or failure
		for($i=0;$i<count($solution);$i++)
		{
			if($solution[$i]==$answers[$i])
				$correctcount++;
		}
		$resultpercentage = round($correctcount / count($solution),2) * 100;

		// SUCCESS
		if($resultpercentage >= $successpercentage)
		{
			echo "<p>Congratulations, you passed the course!</p><br /><p class=\"center\"><img alt=\"congraturations, a winrar is you\" src=\"images/winrar.png\" /></p>";
			// make write connection to update table
			$dblink = mysql_connect($dbhost, $dbwriteuser, $dbwritepass);
			mysql_select_db($dbname);
			// increment the completed value for this course
			mysql_query("UPDATE hackits_courses SET completed=completed+1 WHERE id='$courseid';") or die(mysql_error());
			// get points for this course
			$points = mysql_result(mysql_query("SELECT points FROM `hackits_courses` WHERE `id`='".$courseid."';"),0,0);
			// update courseresults table
			if($lastattempt>0)
			{	mysql_query("UPDATE hackits_courseresults SET finished='$currenttime',lastattempt='$currenttime' WHERE userid='$usernameid' AND courseid='$courseid';") or die(mysql_error()); }
			else
			{	mysql_query("INSERT INTO hackits_courseresults VALUES ('$usernameid', '$courseid','$currenttime','$currenttime')") or die(mysql_error()); }
			// update users table with score or insert new user if this is the first time points are rewarded
			if(mysql_num_rows(mysql_query("SELECT * FROM `hackits_users` WHERE `id`='".$usernameid."';"))==0)
			{	mysql_query("INSERT INTO hackits_users VALUES ('$usernameid', '0', '$points')") or die(mysql_error()); }
			else
			{ 	mysql_query("UPDATE hackits_users SET coursescore=coursescore+".$points." WHERE id='$usernameid';") or die(mysql_error()); }
		}
		// FAIL
		else
		{
			echo "<p>You answered ".$resultpercentage."% of the questions correctly, unfortunately the passing score is ".$successpercentage."%. Have a break and go over the course and exercises again. You can try this examn again in ".($retrytimeout/60)." minutes!</p>";
			// close readonly db connection and make write connection to update table
			$dblink = mysql_connect($dbhost, $dbwriteuser, $dbwritepass);
			mysql_select_db($dbname);
			// update courseresults table with this attempt
			if($lastattempt>0)
			{	mysql_query("UPDATE hackits_courseresults SET lastattempt='$currenttime' WHERE userid='$usernameid' AND courseid='$courseid';") or die(mysql_error()); }
			else
			{	mysql_query("INSERT INTO hackits_courseresults VALUES ('$usernameid', '$courseid','0','$currenttime')") or die(mysql_error()); }
		}
	}
}
?>