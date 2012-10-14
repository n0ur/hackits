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
// File:        courses/overview.php                                             //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Description: Display all courses in the database in an overview  //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../settings.php");

?>
<div id="courses">
<?

	// Set category names and descriptions
	$categories = array(1 => 'General',
						2 => 'Networking',
						3 => 'Security',
						4 => 'Windows',
						5 => 'Linux',
						6 => 'Hardware',
						7 => 'Programming',
						8 => 'Internet',
						9 => 'Databases',
						10 => 'Cryptography');
	$description = array(1 => 'Courses related to the Hackits website itself and courses that don\'t specifically fit into one of the other categories.',
						2 => 'Networking Description',
						3 => 'Security Description',
						4 => 'Windows Description',
						5 => 'Linux Description',
						6 => 'Hardware Description',
						7 => 'Programming Description',
						8 => 'Internet Description',
						9 => 'Databases Description',
						10 => 'Cryptography Description');

	// Make database connection
	$link = mysql_connect($dbhost, $dbreaduser, $dbreadpass);
	mysql_select_db($dbname);

	// Display the courses
	foreach($categories as $id => $name) {

		$nrtotal = 0;
		$nrcompleted = 0;
		$courses = mysql_query("SELECT * FROM `hackits_courses` WHERE `category`='".$id."';");
		$output = "";

		if(mysql_num_rows($courses)>0) {
			while ($course = mysql_fetch_assoc($courses)) {
				$nrtotal++;
				$author = mysql_result(mysql_query("SELECT member_name FROM `smf_members` WHERE `id_member`='".$course['author']."';"),0,0);
				$finished = mysql_result(mysql_query("SELECT finished FROM `hackits_courseresults` WHERE `userid`='".$usernameid."' AND `courseid`='".$course['id']."';"),0,0);
				if(!$finished==NULL) {
					$checked = "<em class=\"checked\"></em>";
					$nrcompleted++;
				}
				else
				{
					$checked = "";
				}
				$output .= "<tr><td class=\"check\">".$checked."</td><td><a onClick=\"showCourse('".$course['id']."')\">".$course['title']."</a></td><td>".$course['points']."</td><td>".$course['level']."</td><td>".$author."</td><td>".$course['completed']."</td></tr>";
			}
		}

		echo "<h3><a href=\"#\">".$name." (".$nrcompleted."/".$nrtotal.")</a></h3><div>";
		echo "<p>".$description[$id]."</p>";
		echo "<div class=\"tablecontainer\"><table><tr><th class=\"check\"></th><th class=\"title\">Title</th><th class=\"points\">Points</th><th class=\"level\">Level</th><th class=\"author\">Author</th><th class=\"completed\">Passed</th></tr>";
		echo $output;
		echo "</table></div>";
		echo "</div>";

	}
	mysql_close($link);

?>
</div>
