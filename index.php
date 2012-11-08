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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" type="text/css" href="forum/Themes/insidiousII2/css/index.css?fin20" />
	<link rel="stylesheet" type="text/css" href="forum/Themes/default/css/webkit.css" />
	<script type="text/javascript" src="forum/Themes/default/scripts/script.js?fin20"></script>
	<script type="text/javascript" src="forum/Themes/insidiousII2/scripts/theme.js?fin20"></script>
	<script type="text/javascript">
		var smf_theme_url = "forum/Themes/insidiousII2";
		var smf_default_theme_url = "forum/Themes/default";
		var smf_images_url = "forum/Themes/insidiousII2/images";
		var smf_scripturl = "https://www.hackits.be/index.php";
		var smf_iso_case_folding = false;
		var smf_charset = "UTF-8";
		var ajax_notification_text = "Loading...";
		var ajax_notification_cancel_text = "Cancel";
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Hackits.be" />
	<title>Hackits.be</title>
	<link rel="canonical" href="https://www.hackits.be/index.php" />
	<style type="text/css">
		.RSSPumpContent { padding: 5px; font-family: Verdana; font-size: 12px; color: #000000; }
		.RSSPumpArticle { padding-bottom: 10px; }
		.RSSPumpContent a:hover { text-decoration: underline; }
	</style>
</head>

<body>

<div id="wrapper">

	<!-- Header -->
	<div id="topbar">

		<div id="memb_time">
			<span><? echo date('F d, o, h:i:s A'); ?></span>
		</div>
		<div id="user_area">
			<p>Logged in as: [ <? echo $usernametext; ?> ]</p>
		</div>
	</div>
	<div id="header">
		<div id="logo">
			<img src="forum/Themes/insidiousII2/images/theme/logo.png" alt="Hackits.be" title="Hackits.be" />
		</div>
	</div>
	<div id="bodyarea" style="overflow: auto; ">

		<!-- Navigation Bar -->
		<div id="navibar">
			<div id="center-menu">
				<div id="topnav">
					<ul>
						<li id="button_home"><a class="active " href="index.php">Home</a></li>
						<li id="button_Forum"><a class="" href="forum/">Forum</a></li>
						<li id="button_Forum"><a class="" href="forum/">Challenges</a></li>
						<li id="button_Forum"><a class="" href="courses/">Courses</a></li>
						<? if(!$loggedin) { ?><li id="button_Forum"><a class="" href="forum/index.php?action=login">Login</a></li><? }
						else { ?> <li id="button_Forum"><a class="" href="forum/index.php?action=profile">Forum Profile</a></li><? } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Frontpage Content -->
		<div id="boardindex_table">
			<p style="padding:15px;">Welcome to Hackits, a community that's all about learning the art of Hacking, sharing knowledge with fellow hackers, demonstrating expertise by solving challenges and learning stuff by doing courses! Check out the links above to navigate to the various parts of the site. Make sure to register an account so you will be able to keep track of your score and view all parts of the site.</p>

			<div id="row1" style="float: left; width: 100%; ">

			<!-- User Profile Block -->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/profile.gif" alt="Hackits Profile" />Your Hackits Profile
						</span>
					</h4>
				</div>
				<p>Under construction</p>
			</div>

			<!-- Ranking Block -->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/rank.gif" alt="Hackits Ranking" />Hackits Ranking List
						</span>
					</h4>
				</div>
				<p>Under construction</p>
			</div>

			<!-- Twitter Block -->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<script charset="utf-8" src="https://widgets.twimg.com/j/2/widget.js" type="text/javascript"></script>
				<script type="text/javascript">
					new TWTR.Widget({version:2,type:'profile',rpp:4,interval:30000,width:'100%',height:300,
					theme:{shell:{background:'#333333',color:'#ffffff'},tweets:{background:'#000000',color:'#ffffff',links:'#4aed05'}},
				  	features:{scrollbar:false,loop:false,live:false,behavior:'all'}}).render().setUser('hackitss').start();
			    </script>
			</div>

			</div>
			<div id="row2" style="float: left; width: 100%; ">

			<!-- RSS Block 1-->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/rss.png" alt="OSVDB RSS" /><a href="http://www.osvdb.org/">OSVDB Latest Vulnerabilities</a> RSS
						</span>
					</h4>
				</div>
				<script type="text/javascript">
				<?
					$foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=230dd345-12af-447f-8017-5916ad290841&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
					$foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
					$foo = substr($foo,0,strlen($foo)-125);
					echo $foo;
				?>
				</script>
			</div>

			<!-- RSS Block 2-->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/rss.png" alt="SecurityFocus Bugtraq RSS" /><a href="http://seclists.org/bugtraq/" target="new">SecurityFocus Bugtraq</a> RSS
						</span>
					</h4>
				</div>
				<script type="text/javascript">
				<?
					$foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=60eebe16-4f04-4c1a-b16b-ce4bf1670d5c&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
					$foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
					$foo = substr($foo,0,strlen($foo)-125);
					echo $foo;
				?>
				</script>
			</div>

			<!-- RSS Block 3-->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/rss.png" alt="Hack in the Box RSS" /><a href="http://news.hitb.org/">Hack in the Box</a> RSS
						</span>
					</h4>
				</div>
				<script type="text/javascript">
				<?
					$foo = file_get_contents("http://s1.rsspump.com/js.aspx?s=39a2d6db-0bd0-4b41-8c21-80fd34165e37&amp;t=0&amp;d=0&amp;u=0&amp;p=1&amp;b=1&amp;co=0&amp;ic=9&amp;font=Verdana&amp;fontsize=12px&amp;bgcolor=&amp;color=000000&amp;su=1&amp;sub=1&amp;sw=1");
					$foo = str_replace("%3cdiv%3e%3ca%20href%3d%22http%3a%2f%2fwww.rsspump.com%22%20target%3d%22_blank%22%20style%3d%22font-size%3a%209px%3b%20font-family%3a%20verdana%3b%20vertical-align%3a%204px%3b%20padding-left%3a3px%3b%22%3ePowered%20By%3a%20RSSPump.com%3c%2fa%3e%3c%2fdiv%3e","",$foo);
					$foo = substr($foo,0,strlen($foo)-125);
					echo $foo;
				?>
				</script>
			</div>

			</div>
			<div id="row3" style="float: left; width: 100%; ">

			<!-- IRC Block-->
			<div style="margin: 5px; width: 32%; position: relative; float: left; overflow-x: hidden;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/irc.png" alt="IRC Last Lines" />Recent IRC Activity:
						</span>
					</h4>
				</div>
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
						echo "<p>Log in to view the recent IRC activity!</p>";
					}
				?>
				<p>Join us on IRC: <a href="irc://irc.quakenet.org/hackits.de">#hackits.de</a> on irc.quakenet.org!</p>
			</div>

			<!-- Challenges Block -->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/challenge.gif" alt="" />Latest Challenges
						</span>
					</h4>
				</div>
				<p>Under Construction</p>
			</div>

			<!-- Courses Block -->
			<div style="margin: 5px; width: 32%; position: relative; float: left;">
				<div class="title_barIC">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img class="icon" src="frontpage/images/course.gif" alt="" />Latest Courses
						</span>
					</h4>
				</div>
				<p>Under Construction</p>
			</div>

			</div>


		</div>

		<!-- Footer -->
		<span class="clear upperframe"><span></span></span>
		<div class="roundframe">
			<div class="innerframe">
				<!-- <div class="cat_bar">
					<h3 class="catbg">yey</h3>
				</div> -->
				<center>
					<a target="new" href='http://ipv6-test.com/validate.php?url=https://www.hackits.be'><img src='frontpage/images/ipv6.png' alt='IPv6 Ready' title='This website is available over IPv6'/></a>
					<a target="new" href='http://validator.w3.org/check?uri=https://www.hackits.be'><img src='frontpage/images/valid_xhtml.png' alt='Valid XHTML 1.0 Transitional' title='This website is Valid XHTML 1.0 Transitional' /></a>
					<a target="new" href='http://www.archlinux.org/'><img src='frontpage/images/arch-linux.png' alt='Powered by Arch Linux' title='Powered by Arch Linux'/></a>
					<a target="new" href='http://httpd.apache.org/'><img src='frontpage/images/apache-powered.png' alt='Powered by Apache' title='Powered by the Apache HTTPD' /></a>
					<a target="new" href='http://www.mysql.com/'><img src='frontpage/images/mysql-powered.jpg' alt='Powered by MySQL' title='Powered by MySQL' /></a>
					<a target="new" href='http://www.php.net/'><img src='frontpage/images/php-powered.png' alt='Powered by PHP' title='Powered by PHP' /></a>
					<br />
					<a href='frontpage/privacy.html'>Privacy Disclaimer</a> -
					<a href='frontpage/copyright.html'>License & Copyright</a> -
					<a href='frontpage/terms.html'>Terms of Agreement</a>
				</center>
			</div>
		</div>

		<span class="lowerframe">
			<span></span>
		</span>

	</div>
</div>
<?php Utils::queryLog(); ?>
</body>
</html>
