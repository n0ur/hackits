<?php
	require("courseheader.php");
?>
<div id="coursenavigation">
	<ol class="tree">
		<li class="file"><a href="#" onClick="selectPart('default')">Introduction</a></li>
		<li>
			<label for="clients">IRC Clients</label><input type="checkbox" checked id="clients" />
			<ol>
				<li class="file"><a href="#" onClick="selectPart('chapter1')">Webclients</a></li>
				<li class="file"><a href="#" onClick="selectPart('chapter2')">Windows</a></li>
				<li class="file"><a href="#" onClick="selectPart('chapter3')">Linux</a></li>
			</ol>
		</li>
		<li>
			<label for="background">Technical Background</label><input type="checkbox" checked id="background" />
			<ol>
				<li class="file"><a href="#" onClick="selectPart('chapter4')">How IRC works</a></li>
				<li class="file"><a href="#" onClick="selectPart('chapter5')">IRC Security</a></li>
				<li class="file"><a href="#" onClick="selectPart('chapter6')">Installing an IRCd</a></li>
			</ol>
		</li>
		<li>
			<label for="exercises">Exercises</label> <input type="checkbox" checked id="exercises" />
			<ol>
				<li class="file"><a href="#" onClick="selectPart('exercise1')">Exercise 1</a></li>
			</ol>
		</li>
		<li class="file"><a href="#" onClick="selectPart('examn')">Exam</a></li>
	</ol>
</div>
<div id="coursecontent">
	<div id="default">
		<h1>Internet Relay Chat (IRC)</h1>
		<p>Under construction!</p>
		<p class="center"><a href="#" onClick="selectPart('chapter1')">>> Let's start! >></a></p>
	</div>
	<div id="chapter1">
		<h1>Webclients</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('chapter2')">>> Next Chapter >></a></p>
	</div>
	<div id="chapter2">
		<h1>Windows Clients</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('chapter3')">>> Next Chapter >></a></p>
	</div>
	<div id="chapter3">
		<h1>Linux Clients</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('chapter4')">>> Next Chapter >></a></p>
	</div>
	<div id="chapter4">
		<h1>How IRC works</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('chapter5')">>> Next Chapter >></a></p>
	</div>
	<div id="chapter5">
		<h1>IRC Security</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('chapter6')">>> Next Chapter >></a></p>
	</div>
	<div id="chapter6">
		<h1>Installing an IRCd</h1>
		<p></p>
		<p class="center"><a href="#" onClick="selectPart('exercise1')">>> Next Chapter >></a></p>
	</div>
	<div id="exercise1">
	<h3>Exercise 1:</h3>
	<p>Exercise text</p>
	<div class="revealbutton" onClick="$('#answer1').show(); $('.revealbutton').hide(); ">Reveal Answer</div>
	<div class="answer" id="answer1">
		<p>Answer</p>
	</div>
	</div>
	<div id="examn">
		<h2>Exam Time!</h2><br />
		<? if(!$loggedin) echo $notloggedintext; ?>
 		<form id="examnform" name="examnform" method="post" action="">
			<div class="question">
				<h3>Question 1</h3><br />
				<p>X</p>
				<input type="radio" value="A" id="radio1" name="1" /><label for="radio1"></label><br />
				<input type="radio" value="B" id="radio2" name="1" /><label for="radio2"></label><br />
				<input type="radio" value="C" id="radio3" name="1" /><label for="radio3"></label><br />
			</div>
			<div class="question">
				<h3>Question 2</h3><br />
				<p>Y</p>
				<input type="radio" value="A" id="radio1" name="2" /><label for="radio1"></label><br />
				<input type="radio" value="B" id="radio2" name="2" /><label for="radio2"></label><br />
				<input type="radio" value="C" id="radio3" name="2" /><label for="radio3"></label><br />
			</div>
			<div id="examnsubmit">
				<button>Submit</button>
			</div>
		</form>
	</div>
</div>