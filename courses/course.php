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
// File:        courses/course.php                                               //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Loads course file specified by $_GET['id']                       //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

?>
<div id="course">
<?
	//
	// Description: Load the course file specified by the GET variable 'id'
	//

	$courseid = $_GET['id'];
	$errorstring = "<p class=\"center\"><img alt=\"Y U NO GIVE ID\" src=\"images/yuno.png\" /><br /><br />No active course, select a valid course from the overview!</p>";
	$filename = "courses/course".$courseid.".php";
	$mincourseid = 0;
	$maxcourseid = 100000;

	if(!isset($courseid)||!is_numeric($courseid)||$courseid<$mincourseid||$courseid>$maxcourseid)
		echo $errorstring;
	else
	{
		if(is_readable($filename))
			include($filename);
		else
			echo $errorstring;
	}
?>
</div>