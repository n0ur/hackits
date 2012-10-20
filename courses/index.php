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
// File:        courses/index.php                                                //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Courses landing page                                             //
//              Note: Can use $_GET['id'] to directly link to a course.          //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../getsmfuser.php");

// If an id is passed as argument, load course directly
if(isset($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);
	$loadcourse = "$(document).ready(function() { $(\"#course\").load(\"course.php?id=\"+".$id."); $(\"#tabs\").tabs(\"select\" , \"tab-course\") } )";
}

// format date for display in header bar
$showdate = date('F d, o, h:i:s A');

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hackits.be - Courses</title>
	<link rel="stylesheet" href="css/jquery-ui-1.8.17.custom.css">
	<link rel="stylesheet" href="css/hackits-courses.css">
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.button.js"></script>
	<script src="js/jquery.ui.position.js"></script>
	<script src="js/jquery.ui.tabs.js"></script>
	<script src="js/jquery.ui.dialog.js"></script>
	<script src="js/jquery.ui.accordion.js"></script>
	<script>
	$(function() {
		$( "#tabs" ).tabs();
		$( "#courses" ).accordion({ autoHeight: false });
	});
	</script>
</head>
<body>
<div id="container">
<div id="center">

	<div id="topbar">
		<div id="memb_time">
			<span><? echo $showdate ?></span>
		</div>
		<div id="user_area">
			<p>[ <a href="https://www.hackits.be/forum">Back to the Hackits.be Forum</a> ] [ Logged in as: <b><? echo $usernametext; ?></b> ] [ All content is licensed under <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/3.0/">CC BY-NC-SA 3.0</a> ]</p>
		</div>
	</div>
	<div id="header">
		<div id="logo">
			<a href="https://www.hackits.be/index.php"><img src="../forum/Themes/insidiousII2/images/theme/logo.png" alt="Hackits.be" title="Hackits.be" /></a>
		</div>
	</div>

<div id="tabs">

	<ul>
		<li class="tab"><a href="#tab-overview">Course Overview</a></li>
		<li class="tab"><a href="#tab-course">Current Course</a></li>
		<li class="tab"><a href="#tab-ranking">Ranking List</a></li>
		<li class="tab"><a href="#tab-help">Help</a></li>
	</ul>

	<div id="tab-overview">
		<? include("overview.php"); ?>
	</div>

	<div id="tab-course">
		<? include("course.php"); ?>
	</div>

	<div id="tab-ranking">
		<? include("ranking.php"); ?>
	</div>

	<div id="tab-help">
		<? include("help.php"); ?>
	</div>

</div> <!-- end-of-tabs -->
</div> <!-- end-of-center -->
</div> <!-- end-of-container -->

<script>
  function showCourse(id){
      $("#course").load("course.php?id="+id);
      $("#tabs").tabs( "select" , "tab-course" )
  }
  <? echo isset($loadcourse) ? $loadcourse : ''; ?>
</script>
<?php Utils::queryLog(); ?>
</body>
</html>
