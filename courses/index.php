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
        var tabStates = { //default states
            overview: '/overview/General',
            course: '/course/General/Intro+to+Hackits+Courses/Hackits+Courses',
            ranking: '/ranking',
            help: '/help'
        },
        selectPart = function(part){
            var part = $("#"+part);
            part.show().siblings().hide();
        },
        getPanelIndex = function(str){
            return $('.ui-accordion-header a').filter(function(){
                return (new RegExp(str)).test($(this).text())
            }).parent().index() / 2;
        },
        updateState = function(e){
            var parts = e.path.split('/')
              , tab = parts[1]
              , panel = parts[2] || ''
              , course = parts[3] || ''
              , chapter = parts[4] || '';
            if(tab.length){ //select tab
                $("#tabs").tabs("select", '#'+tab.replace(/^#/,''));
            }
            if(panel.length){ //select accordion panel
                $("#courses").accordion("activate", getPanelIndex(panel));
                $('a[href$="/course/'+panel+'"]').siblings('input').attr('checked', true);
            }
            if(course.length){ //select course
                $('a[href$="/course/'+panel+'/'+course+'"]').siblings('input').attr('checked', true);
            }
            if(chapter.length){ //select chapter
                $('#coursenavigation li.file a').each(function(){
                    $(this).closest('li').toggleClass('selected',
                        (new RegExp(e.path.replace(/\+/g, '\\+')+'$', 'i'))
                            .test($(this).attr('href')));
                });
                $('#coursecontent').html(
                    $('[id="'
                    + $('a[href$="/course/'+panel+'/'+course+'/'+chapter+'"]:not([rel=overview])').data('chapterid')
                    + '"]').html());
            }
        };

        $("#tabs").tabs({
            select: function(event, ui){
                var oldSelected = $('#tabs .ui-tabs-selected a').attr('href').replace(/^#/, '')
                        , newSelected = ui.tab.hash.replace(/^#/, '');
                if((new RegExp('^/'+newSelected, 'i')).test($.address.path())){ return; }
                tabStates[oldSelected] = $.address.path();
                $.address.path(tabStates[newSelected]);
            }
        });
        $("#courses").accordion({
            autoHeight: false
        });

        $.address.init(function(e){
            if($.address.path() === '/'){
                $.address.path(tabStates.overview); //default to overview
            }
            $('#coursenavigation .file a[data-chapterid]').address(function() {
                return $(this).attr('href');
            });
            tabStates[$.address.path().match(/^\/([^\/]+)/)[0].substr(1)] = $.address.path();
        }).change(updateState)
        .internalChange({}, updateState)
        .externalChange({}, updateState);
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
		<li class="tab"><a rel="address:/overview" href="#overview">Course Overview</a></li>
		<li class="tab"><a rel="address:/course" href="#course">Current Course</a></li>
		<li class="tab"><a rel="address:/ranking" href="#ranking">Ranking List</a></li>
		<li class="tab"><a rel="address:/help" href="#help">Help</a></li>
	</ul>

	<div id="overview">
		<? include("overview.php"); ?>
	</div>

	<div id="course">
		<?
        require_once("courseheader.php");
        include("course.php");
        ?>
	</div>

	<div id="ranking">
		<? include("ranking.php"); ?>
	</div>

	<div id="help">
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
