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
// File:        courses/courseheader.php                                         //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Header included in all course pages, to provide JS etc.          //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require_once("../getsmfuser.php");

$notloggedintext = "<p class=\"warning\">Warning: You aren't logged in to the Hackits forum, submitting this exam will only count if you are logged in!</p>";
$courseid = isset($_GET['id']) ? $_GET['id'] : 0;

?>
<script type="text/javascript">
	// when the examn form is submitted, show the results in a dialog window
	$(document).ready(function(){
		$("#examnform").submit( function () {
		  $.post(
		   'examnhandler.php?id=<? echo $courseid; ?>',
			$(this).serialize(),
			function(data){
				$("#examnresult").empty().append(data).dialog("open");
			}
		  );
		  return false;
		});
	});
	$("#examnresult").dialog({ autoOpen: false, minWidth: 500 });

	// start with only the default div shown
	$("#default").show().siblings().hide();

</script>

<div id="examnresult" title="Exam Results"></div>
