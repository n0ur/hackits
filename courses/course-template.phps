<?

require("courseheader.php");

?>

<div id="coursenavigation">
	<ol class="tree">
		<li class="file"><a data-contentid="default" href="#/course/General/Introduction">Introduction</a></li>
		<li>
			<label for="theory">Theory</label><input type="checkbox" checked id="theory" />
			<ol>
				<li class="file"><a data-contentid="chapter1" href="#/course/General/Chapter+1">Chapter 1</a></li>
				*** add more chapter links here ***
			</ol>
		</li>
		<li>
			<label for="exercises">Exercises</label> <input type="checkbox" checked id="exercises" />
			<ol>
				<li class="file"><a data-contentid="exercise1" href="#/course/General/Exercise+1">Exercise 1</a></li>
				*** add more exercise links here ***
			</ol>
		</li>
		<li class="file"><a data-contentid="examn" href="#/course/General/Exam">Exam</a></li>
	</ol>
</div>

<div id="coursecontent">

	<div id="default">
		Default
		<p class="center"><a href="#/course/General/[nextChapterName]">>> Next Chapter >></a></p>
	</div>

	<div id="chapter1">
		Chapter 1
	</div>

	*** add more chapter content here ***

	<div id="exercise1">
		<h3>Exercise 1:</h3>
		<p>Exercise text</p>
		<div class="revealbutton" onClick="$('#answer1').show(); $('.revealbutton').hide(); ">Reveal Answer</div>
		<div class="answer" id="answer1">
			<p>Answer</p>
		</div>
	</div>
	
	*** add more exercise content here ***

	<div id="examn">
		<h2>Exam Time!</h2><br /><? if(!$loggedin) echo $notloggedintext; ?>

 		<form id="examnform" name="examnform" method="post" action="">

			<div class="question">
				<h3>Question 1</h3><br />
				<p>Questiontext</p>
				<input type="radio" value="A" id="radio1" name="1" /><label for="radio1">Answer1</label><br />
				<input type="radio" value="B" id="radio2" name="1" /><label for="radio2">Answer2</label><br />
				<input type="radio" value="C" id="radio3" name="1" /><label for="radio3">Answer3</label><br />
			</div>
			
			*** add more questions here ***

			<div id="examnsubmit">
				<button>Submit</button>
			</div>

		</form>

	</div>
</div>
