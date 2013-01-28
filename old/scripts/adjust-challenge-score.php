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
// File:        scripts/adjust-challenge-score.php                               //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Script that adjusts scores based on how many people complete a   //
//              challenge. Can be ran daily/hourly in a cronjob for example.     //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

echo date("d-m-y H:i:s ")." - Starting score adjustment...<br />";

require("../settings.php");

$link = mysql_connect($dbhost,$dbreaduser,$dbreadpass);
if (!$link) {
	die('Server made a whoops: ' . mysql_error());
}
mysql_select_db($dbname);

$members = mysql_query("SELECT * FROM hackits_users");
$challenges = mysql_query("SELECT id,completed FROM hackits_challenges");
$number_of_users = mysql_num_rows($members);

echo date("d-m-y H:i:s ")." - Found ".$number_of_users." Hackits users...<br />";

// Assign value per challenge based on number of members that completed it
while($challenge = mysql_fetch_array($challenges, MYSQL_ASSOC)) {
	$challenge_value[$challenge["id"]] = round(($number_of_users / $challenge["completed"]),0);
	echo date("d-m-y H:i:s ")." - Challenge ID ".$challenge["id"]." was completed by ".$challenge["completed"]." users (".round(($challenge["completed"]/$number_of_users)*100,0)."%), value is ".$challenge_value[$challenge["id"]]." points<br />";
}

echo date("d-m-y H:i:s ")." - Finished score adjustment";

?>