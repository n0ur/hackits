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
  <meta name="description" content="Hackits.be" />
  <title>Hackits.be - Courses</title>
  <!-- <link rel="stylesheet" href="../frontpage/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../frontpage/css/bootstrap.css">
  <link rel="stylesheet" href="../frontpage/css/custom.css">
  <link rel="stylesheet" href="../frontpage/css/bootstrap-responsive.css">
  <script src="../frontpage/js/jquery-1.8.1.min.js"></script>
  <script src="../frontpage/js/bootstrap.min.js"></script>
  <script src="js/jquery.address.js"></script>
  <script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
  <script>
  $(function() {
        var tabStates = { //default states
            overview: '/overview',
            course: '/course',
            ranking: '/ranking',
            help: '/help'
        },
        updateState = function(e){
            var parts = e.path.split('/')
              , tab = tabStates.hasOwnProperty(parts[1]) ? parts[1] : 'overview'
              , category = parts[2] || ''
              , course = parts[3] || ''
              , chapter = parts[4] || '';
            if(tab.length){ //select tab
                $('.tab-pane.active').removeClass('active').addClass('fade');
                $('#coursesTabs li.active').removeClass('active');
                $('#'+tab).addClass('active in');
                $('#coursesTabs li a[href=#'+tab+']').parent().addClass('active');
            }
            if(category.length){ //select accordion panel
              var h4Cat = $('h4#'+category),
              aCat = $('a[href="#/course/'+category+'"]');
              if(h4Cat.length) {  // we dont want this to get executed when we're in #/courses/etc
                $.scrollTo(h4Cat);
                $.scrollTo('-=20px');
              } 
              if (aCat.length) {
                aCat.next('ul').show();
              }
            }
            if(course.length){ //select course
              var aCourse = $('a[href="#/course/'+category+'/'+course+'"]');
              if(aCourse.length) {
                console.log("here")
                aCourse.next('ul').show();
              }
            }
            if(chapter.length){ //select chapter
              //TODO: what's another way to load courses?
            }
        };
        $('ul#coursesTabs li a').click(function(e){
          var index = $(this).attr('href').replace(/^#/, '');
          $.address.path(tabStates[index]);
        });
        $('a.title').next('ul').hide();
        $.address.init(function(e){
            if($.address.path() === '/'){
                $.address.path(tabStates.overview); //default to overview
            }
            // what do these do?
            // $('#coursenavigation .file a[data-chapterid]').address(function() {
            //     return $(this).attr('href');
            // });
            // tabStates[$.address.path().match(/^\/([^\/]+)/)[0].substr(1)] = $.address.path();
        }).change(updateState)
        .internalChange({}, updateState)
        .externalChange({}, updateState);
    });
  </script>
</head>

<body>
  <?php include("../frontpage/shared/_header.php"); ?>

  <div class="container wrapper">
     <p class="pbody date"><? echo date('F d, o, h:i:s A'); ?></p>
    <div class="logo"><img src="../frontpage/img/hackits_logo.png" alt="Hackits.be" title="Hackits.be" /></div>

    <div class="row">
      <div class="span12">

        <div class="tabbable">
          <ul id="coursesTabs" class="nav nav-tabs">
            <li class="active"><a href="#overview" data-toggle="tab">Course Overview</a></li>
            <li class=""><a href="#course" data-toggle="tab">Current Course</a></li>
            <li class=""><a href="#ranking" data-toggle="tab">Ranking List</a></li>
            <li class=""><a href="#help" data-toggle="tab">Help</a></li>
          </ul>

          <div id="tabContent" class="tab-content">
            <div class="tab-pane fade active in" id="overview">
              <? include("overview.php"); ?>
            </div>

            <div class="tab-pane fade" id="course">
              <?
                require_once("courseheader.php");
                include("course.php");
              ?>
            </div>

            <div class="tab-pane fade" id="ranking">
              <? include("ranking.php"); ?>
            </div>

            <div class="tab-pane fade" id="help">             
              <? include("help.php"); ?>
            </div>
          </div>
        </div>


      </div>
    </div>
    <?php include("../frontpage/shared/_footer.html"); ?>
  </div>
<?php Utils::queryLog(); ?>
</body>
</html>