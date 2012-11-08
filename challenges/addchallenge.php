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
// File:        challenges/getsmfuser.php                                        //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: form and formhandler for adding challenges to the database       //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("../settings.php");
if(!isset($_GET['pass'])) die($wrongpasserror);
if($_GET['pass'] != $challengeaddpass) die($wrongpasserror);

//////////////////
// Form handler //
//////////////////

if(isset($_POST['hashinput'])){
	// Sanitize form input
	$type = $_POST['type'];
	$answer = $_POST['answer'];
	$hashinput = $_POST['hashinput'];

	// Validate form input
	if(strlen($answer)>250 || strlen($type)>5 || strlen($hashinput)>100)
		die("One or more values too long");
	if(($type==1&&$answer=="")||($type==2&&$hashinput=="")||$type=="")
		die("One or more values empty");
	if(!is_numeric($type))
		die("Only answer can contain anything else then numbers!");

	switch($type){ // plain
        case 1:
            $msg = "<p>Added succesfully!<br />URL for use in forum post: https://www.hackits.be/challenges/check.php?id=%s&answer=";
            break;
	    case 2:
            $answer = hash("sha512",$hashinput);
            $msg = "<p>Added succesfully!<br />URL that completes challenge: https://www.hackits.be/challenges/check.php?id=%s&hash=";
            break;
        default:
	}

    $id = $db->exec("
        INSERT INTO hackits_challenges
        VALUES (:id, :type, :answer, :points)",
        array(
            ':id' => null,
            ':type' => $type,
            ':answer' => $answer,
            ':points' => 0,
        ));
    printf($msg, $id);
}

//////////////////
//     Form     //
//////////////////

else
{ ?>

<html>
<head>
	<title>Hackits - Add Challenge</title>
	<script src="../courses/js/jquery-1.7.1.min.js"></script>
	<script>
		$(function() {
			$('#hash').hide();
			$('#plain').hide();
		});
	</script>
</head>
<body>
	<form action="" method="post" style="width: 500px;">
		<fieldset>
			<legend>Add Challenge</legend>
			<p>Type of answer:<br />
				<input type="radio" name="type" value="2"  onclick="$('#plain').hide(); $('#hash').show();"/> Hash URL<br />
				<input type="radio" name="type" value="1" onclick="$('#plain').show(); $('#hash').hide();"/> Plain answer
			</p>
			<div id="plain">
				<p><label for="answer">Answer</label><input type="text" id="answer" name="answer" maxlength="250" /></p>
			</div>
			<div id="hash">
				<p><label for="hashinput">Hash = sha512(</label><input type="text" id="hashinput" name="hashinput" maxlength="50" />)</p>
			</div>
			<button>Submit</button>
		</fieldset>
	</form>
</body>
</html>

<? } ?>
