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
// File:        courses/addcourse.php                                            //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: form and formhandler for adding courses to the database          //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../settings.php");

// First check if user is authorized with simple static password
if($_GET['pass']!=$courseaddpass) die($wrongpasserror);

//////////////////
// Form handler //
//////////////////

if(isset($_POST['category']))
{
	// Connect to MySQL
	$link = mysql_connect($dbhost, $dbwriteuser, $dbwritepass);
	mysql_select_db($dbname);

	// Sanitize form input
	$title = mysql_real_escape_string($_POST['title']);
	$author = mysql_real_escape_string($_POST['author']);
	$solution = mysql_real_escape_string($_POST['solution']);
	$category = mysql_real_escape_string($_POST['category']);
	$level = mysql_real_escape_string($_POST['level']);
	$points = mysql_real_escape_string($_POST['points']);

	// Validate form input
	if(strlen($title)>100 || strlen($category)>2 || strlen($level)>1 || strlen($points)>3)
		die("One or more values too long");
	if($title==""||$category==""||$level==""||$points=="")
		die("One or more values empty");
	if(!is_numeric($category)||!is_numeric($level)||!is_numeric($points))
		die("Only title can contain anything else then numbers!");

	mysql_query("INSERT INTO hackits_courses VALUES ('0','$points','$level','$category','$author','$title','$solution','0');") or die(mysql_error());
	echo "<p>Course succesfully added with ID ".mysql_insert_id($link).".</p>";
}

//////////////////
//     Form     //
//////////////////

else
{ ?>

<html>
	<head>
		<title>Hackits - Add Course</title>
	</head>
<body>
	<form action="" method="post" style="width: 400px;">
		<fieldset>
			<legend>Add Course</legend>
			<label for="title">Title</label><input type="text" id="title" name="title" maxlength="100" /><br />
			<label for="author">Author</label><input type="text" id="author" name="author" maxlength="5" /> (SMF UserID)<br />
			<label for="solution">Solution</label><input type="text" id="solution" name="solution" maxlength="100" /> (for example "abcadabd")<br />
			<label for="points">Points</label><input type="text" id="points" name="points" maxlength="3" value="5"/><br />
			<label for="category">Category</label>
			<select id="category" name="category">
			  <option value="1">General</option>
			  <option value="2">Networking</option>
			  <option value="3">Security</option>
			  <option value="4">Windows</option>
			  <option value="5">Linux</option>
			  <option value="6">Hardware</option>
			  <option value="7">Programming</option>
			  <option value="8">Internet</option>
			  <option value="9">Databases</option>
			  <option value="10">Cryptography</option>
			</select><br />
			<label for="level">Level</label>
			<select id="level" name="level">
			  <option value="1">Beginner</option>
			  <option value="2">Intermediate</option>
			  <option value="3">Advanced</option>
			  <option value="4">Expert</option>
			  <option value="5">Hardcore</option>
			</select>
			<button>Submit</button>
		</fieldset>
	</form>
	<p>Note that this script does not validate the SMF UserID, please be careful when adding stuff.</p>
</body>
</html>

<? } ?>