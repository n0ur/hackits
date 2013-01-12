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
            <? include("overview.php"); ?>
            
            <div class="tab-pane fade" id="current">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa
               nulla single-origin coffee squid. Exercitation +1 labore velit,
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                 craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                  aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                    Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY
                     ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr 
                     butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
            <div class="tab-pane fade" id="rank">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa
               nulla single-origin coffee squid. Exercitation +1 labore velit,
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                 craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                  aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                    Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY
                     ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr 
                     butcher vero sint qui sapiente accusamus tattooed echo park.</p>              
            </div>
            <div class="tab-pane fade" id="help">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa
               nulla single-origin coffee squid. Exercitation +1 labore velit,
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                 craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                  aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                   mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                    Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY
                     ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr 
                     butcher vero sint qui sapiente accusamus tattooed echo park.</p>                
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