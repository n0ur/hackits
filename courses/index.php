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

// format date for display in header bar
$showdate = date('F d, o, h:i:s A');

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hackits.be - Courses</title>
	<link rel="stylesheet" href="css/jquery-ui-1.8.17.custom.css">
	<link rel="stylesheet" href="css/hackits-courses.css">
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.button.js"></script>
	<script src="js/jquery.ui.position.js"></script>
	<script src="js/jquery.ui.tabs.js"></script>
	<script src="js/jquery.ui.dialog.js"></script>
	<script src="js/jquery.ui.accordion.js"></script>
    <script src="js/jquery.address.js"></script>
<!--    <script src="js/jquery.history.js"></script>-->
	<script>
	$(function() {
        if(!location.hash.length){
            location.hash = '#/overview/General';
        }
        var parts = location.hash.split('/')
          , tab = parts[1]
          , panel = parts[2] || ''
          , course = parts[3] || ''//|| $('a[rel=course]:first').data('courseid');
          , chapter = parts[4] || ''
          , loaded = 0
          , courselink;

        var getPanelIndex = function(str){
            return $('.ui-accordion-header a').filter(function(){
                return (new RegExp(str)).test($(this).text())
            }).parent().index() / 2;
        }

        var setHash = function(str, index){
            console.log('sethash ', str, index, location.hash);
            var hash = location.hash.split('/');
            if(hash.length >= index){
                if(str && str.length){
                    hash[index] = str;
                } else {
                    //hash = hash.splice(0, index);
                }
            }
            switch(str){
                case 'overview':
                    hash = hash.splice(0, index);
                    break;
            }
            location.hash = hash.join('/');
        }


        if(tab == '' && getPanelIndex(tab) < 0){
//            panel = '';
//            setHash('', 2);
        }

        var tabSubPath = [];
        $("#tabs").tabs({
            select: function(event, ui){
                //debugger;

                var selected = $('#tabs .ui-tabs-selected a').attr('href').replace('#tab-', '');
                tabSubPath[selected] = location.hash.split('/').splice(2).join('/');
                console.log(selected, tabSubPath[selected]);
                setHash(ui.tab.hash.replace(/^#tab-/,''), 1);
                //location.hash += tabSubPath[ui.tab.hash.replace(/^#tab-/,'')] || '';
            }
        });

        // shows the specified div and hides all others
        var selectPart = function(part){
            var part = $("#"+part);
            part.show().siblings().hide();
        }

        $.address.change(function(event){
//            parts = location.hash.split('/')
//              , tab = parts[1]
//              , panel = parts[2] || ''
//              , course = parts[3] || ''//|| $('a[rel=course]:first').data('courseid');
//              , chapter = parts[4] || '';
            if(tab.length){ $("#tabs").tabs("select", '#tab-'+tab.replace(/^#/,'')); }
            if(panel.length){
                $("#courses").accordion("activate", getPanelIndex(panel));
            }

            courselink = $('a[rel=course]').filter(function(){
                return (new RegExp('^'+decodeURIComponent(course).replace(/\+/g, ' ')+'$')).test($(this).text())
            });
            if(!courselink){
                courselink = $('a[rel=course]:first');
            }

            if(chapter.length && !(new RegExp(chapter+'$')).test(courselink.text()) && loaded != $(courselink).data('courseid')){
                $("#course").load("course.php?id="+$(courselink).data('courseid'), function(){
                    loaded = $(courselink).data('courseid');
                    var link = $('#coursenavigation a').filter(function(){
                        return (new RegExp(decodeURIComponent(chapter).replace(/\+/g, ' '))).test($(this).text());
                    });
                    link.click();
                });
            } else if(!chapter.length && loaded != $(courselink).data('courseid')){
                $("#course").load("course.php?id="+$(courselink).data('courseid'), function(){
                    loaded = $(courselink).data('courseid');
                    chapter = $('#coursenavigation a:first')
                    setHash(chapter.text().replace(/ /g, '+'), 5);
                });
            }
        });

        $("#courses").accordion({
            autoHeight: false,
            change: function(event, ui){
                panel = ui.newHeader.find("a").text().match(/^.+\S(?=\s\()/);
                console.log('accor panel ', panel);
                setHash(panel, 2);
                $("#tabs").tabs("select", 0);
            }
        });

        $('a[rel=course]').click(function(e){
            if(loaded != $(courselink).data('courseid') || !loaded){
                loaded = $(courselink).data('courseid');
                if(!loaded){
                    console.log("!!!!!!not loaded");
                }
                $("#course").load("course.php?id="+$(this).data('courseid'), function(){
                    setHash($(this).data('courseid'), 3);
                    $("#tabs").tabs("select", 1);
                });
            } else {
                console.log("already loaded "+loaded, $(courselink).data('courseid'));
            }
        });

        $('#tab-course').delegate('#coursenavigation a', 'click', function(e){
            selectPart($(this).data('contentid'));
        });
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
		<?
        require_once("courseheader.php");
        include("course.php");
        ?>
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
  <? echo isset($loadcourse) ? $loadcourse : ''; ?>
</script>
<?php Utils::queryLog(); ?>
</body>
</html>
