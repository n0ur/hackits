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
// File:        index.php                                                        //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Main portal and landingpage for Hackits.be                       //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require("settings.php");
require("getsmfuser.php");

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Hackits.be" />
  <title>Hackits.be</title>
  <link rel="stylesheet" href="frontpage/css/bootstrap.css">
  <link rel="stylesheet" href="frontpage/css/custom.css">
  <link rel="stylesheet" href="frontpage/css/bootstrap-responsive.css">
  <script src="frontpage/js/jquery-1.8.1.min.js"></script>
</head>

<body>
  <?php include("frontpage/shared/_header.php"); ?>
  
  <div class="container wrapper">
     <p class="pbody date"><? echo date('F d, o, h:i:s A'); ?></p>
    <div class="logo"><img src="frontpage/img/hackits_logo.png" alt="Hackits.be" title="Hackits.be" /></div>
    <p class="lead">
      <span class="paragraph_lead">Welcome to Hackits,</span> a community that's all about learning the art of hacking, sharing knowledge and demonstrating expertise by solving challenges and doing courses.<br /> Start by checking out some of [parts of the site]. Make sure to register to keep track of your score and have access to all parts of the website.
    </p>
    <div class="row">
      <div class="span12 clearfix">
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_352_nameplate.png" alt="profile" /> Your Hackits Profile</p>
          <p class="pbody">
            under construction
          </p>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_328_podium.png" alt="ranking" /> Hackits Ranking List</p>
          <p class="pbody">
            under construction
          </p>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_411_twitter.png" /> @hackits</p>
          <p class="pbody">
            <script charset="utf-8" src="https://widgets.twimg.com/j/2/widget.js" type="text/javascript"></script>
            <script type="text/javascript">
              new TWTR.Widget({version:2,type:'profile',rpp:4,interval:30000,width:'100%',height:300,
              theme:{shell:{background:'#fff',color:'#999'},tweets:{background:'#fff',color:'#000',links:'#DB0C41'}},
                features:{scrollbar:false,loop:false,live:false,behavior:'all'}}).render().setUser('hackitss').start();
            </script>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="span12 clearfix">
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_417_rss.png" alt="rss" /><a href="http://www.osvdb.org/">OSVDB Latest Vulnerabilities</a></p>
          <ul class="pbody unstyled">
          <script type="text/javascript">
            <?
              $foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=230dd345-12af-447f-8017-5916ad290841&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
              $foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
              $foo = substr($foo,0,strlen($foo)-125);
              echo $foo;
            ?>
          </script>
          </ul>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_417_rss.png" alt="rss" /> <a href="http://seclists.org/bugtraq/" target="new">SecurityFocus Bugtraq</a></p>
          <ul class="pbody unstyled">
          <script type="text/javascript">
          <?
            $foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=60eebe16-4f04-4c1a-b16b-ce4bf1670d5c&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
            $foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
            $foo = substr($foo,0,strlen($foo)-125);
            echo $foo;
          ?>
          </script>
          </ul>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_417_rss.png" alt="rss" /> <a href="http://news.hitb.org/">Hack in the Box</a></p>
          <ul class="pbody unstyled">
            <script type="text/javascript">
            <?
              $foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=39a2d6db-0bd0-4b41-8c21-80fd34165e37&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
              $foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
              $foo = substr($foo,0,strlen($foo)-125);
              echo $foo;
            ?>
            </script>
          </ul>
        </div>
      </div>
    </div> 
    <div class="row">
      <div class="span12 clearfix">
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_244_conversation.png" alt="rss" /> Recent IRC Activity</p>
          <p class="pbody">
            <?
              if($loggedin)
              {
                unset($output);
                exec("tail -15 ".DOC_ROOT."/frontpage/logfile 2>&1", $output);
                $channel = "#hackits.de";
                foreach($output as $outputline) {
                  $start = strpos($outputline,"PRIVMSG $channel");
                  if($start > 0)
                  {
                    $timelength = 8; // (XX:YY:ZZ)
                    $channellength = strlen($channel);
                    $outputline = htmlspecialchars($outputline);
                    $time = substr($outputline,0,$timelength);
                    $nick = substr($outputline,$timelength+1,strpos($outputline,"!")-$timelength-1);
                    $message = substr($outputline,$start+$channellength+$timelength+2,strlen($outputline));
                    echo ($time." &lt;".$nick."&gt; ".$message."<br />");
                  }
                }
              }
              else
              {
                echo "<p class='pbody'>Log in to view the recent IRC activity!</p>";
              }
            ?>
            <p class="pbody">Join us on IRC: <a href="irc://irc.quakenet.org/hackits.de">#hackits.de</a> on irc.quakenet.org!</p>
          </p>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_268_keyboard_wireless.png" alt="rss" /> Latest Challenges</p>
          <p class="pbody">
            under construction
          </p>
        </div>
        <div class="boxie">
          <p class="title"><img src="frontpage/img/glyphicons_330_blog.png" alt="rss" /> Latest Courses</p>
          <p class="pbody">
            under construction
          </p>
        </div>
      </div>
    </div>
  
    <?php include("frontpage/shared/_footer.html"); ?>
  </div>
<?php Utils::queryLog(); ?>
</body>
</html>