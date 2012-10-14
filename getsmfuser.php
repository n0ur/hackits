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
// File:        getsmfuser.php                                                   //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Checks if there exists a PHPSESSID cookie with an ID that is     //
//              considered 'online' in the SMF forum (smf_members table).        //
//              Provides $usernametext and $loggedin to the rest of the code.    //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("settings.php");

$sessionid = $_COOKIE['PHPSESSID'];

if($sessionid=="")
{
	$usernametext = $msg_notloggedin;
	$loggedin = 0;
}
else
{
	$link = mysql_connect($dbhost,$dbreaduser,$dbreadpass);
	if (!$link) {
	    die('Server made a whoops: ' . mysql_error());
	}
	mysql_select_db($dbname);
	$sessionid = mysql_real_escape_string($sessionid);
	$query = "SELECT `member_name`,`id_member` FROM `smf_members` WHERE `id_member` = (SELECT `id_member` FROM `smf_log_online` WHERE `session`='".$sessionid."');";
	$usernametext = mysql_result(mysql_query($query), 0, 0);
	$usernameid = mysql_result(mysql_query($query), 0, 1);
	mysql_close($link);

	if($usernametext=="")
	{
		$usernametext = $msg_notloggedin;
		$loggedin = 0;
	}
	else
	{
		$loggedin = 1;
	}
}

?>