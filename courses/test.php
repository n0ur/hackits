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
  <link rel="stylesheet" href="../frontpage/css/bootstrap.min.css">
  <link rel="stylesheet" href="../frontpage/css/custom.css">
  <script src="../frontpage/js/jquery-1.8.1.min.js"></script>
  <script src="../frontpage/js/bootstrap.min.js"></script>
  <script>
  // $(function() {
  //       var tabStates = { //default states
  //           overview: '/overview/General',
  //           course: '/course/General/Intro+to+Hackits+Courses/Hackits+Courses',
  //           ranking: '/ranking',
  //           help: '/help'
  //       },
  //       selectPart = function(part){
  //           var part = $("#"+part);
  //           part.show().siblings().hide();
  //       },
  //       getPanelIndex = function(str){
  //           return $('.ui-accordion-header a').filter(function(){
  //               return (new RegExp(str)).test($(this).text())
  //           }).parent().index() / 2;
  //       },
  //       updateState = function(e){
  //           var parts = e.path.split('/')
  //             , tab = parts[1]
  //             , category = parts[2] || ''
  //             , course = parts[3] || ''
  //             , chapter = parts[4] || '';
  //           if(tab.length){ //select tab
  //               $("#tabs").tabs("select", '#'+tab.replace(/^#/,''));
  //           }
  //           if(category.length){ //select accordion panel
  //               $("#courses").accordion("activate", getPanelIndex(category));
  //               $('a[href$="/course/'+category+'"]').siblings('input').attr('checked', true);
  //           }
  //           if(course.length){ //select course
  //               $('a[href$="/course/'+category+'/'+course+'"]').siblings('input').attr('checked', true);
  //           }
  //           if(chapter.length){ //select chapter
  //               $('#coursenavigation li.file a').each(function(){
  //                   $(this).closest('li').toggleClass('selected',
  //                       (new RegExp(e.path.replace(/\+/g, '\\+')+'$', 'i'))
  //                           .test($(this).attr('href')));
  //               });
  //               $('#coursecontent').html(
  //                   $('[id="'
  //                   + $('a[href$="/course/'+category+'/'+course+'/'+chapter+'"]:not([rel=overview])').data('chapterid')
  //                   + '"]').html());
  //           }
  //       };

  //       $("#tabs").tabs({
  //           select: function(event, ui){
  //               var oldSelected = $('#tabs .ui-tabs-selected a').attr('href').replace(/^#/, '')
  //                       , newSelected = ui.tab.hash.replace(/^#/, '');
  //               if((new RegExp('^/'+newSelected, 'i')).test($.address.path())){ return; }
  //               tabStates[oldSelected] = $.address.path();
  //               $.address.path(tabStates[newSelected]);
  //           }
  //       });
  //       $("#courses").accordion({
  //           autoHeight: false,
  //           animated: false
  //       });

  //       $.address.init(function(e){
  //           if($.address.path() === '/'){
  //               $.address.path(tabStates.overview); //default to overview
  //           }
  //           $('#coursenavigation .file a[data-chapterid]').address(function() {
  //               return $(this).attr('href');
  //           });
  //           tabStates[$.address.path().match(/^\/([^\/]+)/)[0].substr(1)] = $.address.path();
  //       }).change(updateState)
  //       .internalChange({}, updateState)
  //       .externalChange({}, updateState);
  //   });
  </script>
</head>

<body>
  <?php include("../frontpage/shared/_header.php"); ?>

  <div class="container wrapper">
    <div class="logo"><img src="../frontpage/img/hackits_logo.png" alt="Hackits.be" title="Hackits.be" /></div>

    <div class="row">
      <div class="span12">

        <div class="tabbable">
          <ul id="coursesTabs" class="nav nav-tabs">
            <li class="active"><a href="#overview" data-toggle="tab">Course Overview</a></li>
            <li class=""><a href="#current" data-toggle="tab">Current Course</a></li>
            <li class=""><a href="#rank" data-toggle="tab">Ranking List</a></li>
            <li class=""><a href="#help" data-toggle="tab">Help</a></li>
          </ul>

          <div id="tabContent" class="tab-content">
            <div class="tab-pane fade active in" id="overview">
              <? include("overview.php"); ?>
            </div>

            <div class="tab-pane fade" id="current">
              <?
                require_once("courseheader.php");
                include("course.php");
              ?>
            </div>

            <div class="tab-pane fade" id="rank">
            </div>

            <div class="tab-pane fade" id="help">             
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