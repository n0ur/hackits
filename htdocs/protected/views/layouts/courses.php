<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="language" content="en" />
    <meta name="description" content="Hackits.be" />
    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/jquery.address.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/jquery.scrollTo-1.4.3.1-min.js"></script>
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
              var aCat = $('a[href="#/course/'+category+'"]');
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

  <header>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li class="<? if(true) echo 'active'; ?>">
              <a href="/index.php">Home</a>
            </li>
            <li class="<? if(false) echo 'active'; ?>">
              <a href="">Forum</a>
            </li>
            <li class="<? if(false) echo 'active'; ?>">
              <a href="">Challenges</a>
            </li>
            <li class="<? if(false) echo 'active'; ?>">
              <a href="">Courses</a>
            </li>
            
          </ul>
          <ul class="nav pull-right">
            <li><a href="">Login</a>
              <!-- Logged in as: <a href="forum/index.php?action=profile">[  ]</a> -->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <?#php echo $content; ?>

  <div class="container wrapper">
    <p class="pbody date"><? echo date('F d, o, h:i:s A'); ?></p>
    <div class="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hackits_logo.png" alt="Hackits.be" title="Hackits.be" /></div>

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
              <?# include("overview.php"); ?>
            </div>
            <div class="tab-pane fade" id="course">
              <?
                #require_once("courseheader.php");
                #include("course.php");
              ?>
            </div>
            <div class="tab-pane fade" id="ranking">
              <? #include("ranking.php"); ?>
            </div>
            <div class="tab-pane fade" id="help">             
              <? #include("help.php"); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <a target="new" href="http://ipv6-test.com/validate.php?url=https://www.hackits.be" rel="noreferrer">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ipv6.png" alt="IPv6 Ready" title="This website is available over IPv6">
      </a>
      <a target="new" href="http://validator.w3.org/check?uri=https://www.hackits.be">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/valid_xhtml.png" alt="Valid XHTML 1.0 Transitional" title="This website is Valid XHTML 1.0 Transitional">
      </a>
      <a target="new" href="http://www.archlinux.org/" rel="noreferrer">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/arch-linux.png" alt="Powered by Arch Linux" title="Powered by Arch Linux">
      </a>
      <a target="new" href="http://httpd.apache.org/" rel="noreferrer">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/apache-powered.png" alt="Powered by Apache" title="Powered by the Apache HTTPD">
      </a>
      <a target="new" href="http://www.mysql.com/" rel="noreferrer">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mysql-powered.jpg" alt="Powered by MySQL" title="Powered by MySQL">
      </a>
      <a target="new" href="http://www.php.net/">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/php-powered.png" alt="Powered by PHP" title="Powered by PHP">
      </a><br />

      <ul>
        <li><a href="/privacy.html">Privacy Disclaimer</a></li> - 
        <li><a href="/copyright.html">License &amp; Copyright</a></li> - 
        <li><a href="/terms.html">Terms of Agreement</a></li>
      </ul>
    </footer>  
  </div>
</body>
</html>