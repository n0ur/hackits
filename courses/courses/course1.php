<?php
require("courseheader.php");

    $msg = !$loggedin ? $notloggedintext : '';

return array(
    'nav' => array(
        'default' => array(
            'chapter1' => 'Hackits Courses',
            'chapter2' => 'More about courses',
        ),
        'exercises' => array(
            'exercise1' => 'Exercise 1',
        ),
        'exam' => array(
            'exam1' => 'Exam',
        )
    ),
    'content' => array(
        'default' => <<<°
            <h1>Welcome</h1>
            <p>Thanks for checking out the Hackits Courses! These courses will help you to learn a lot about a wide variety of topics related to hacking, computer security, and a lot more. They will help you tackle the Hackits challenges and lift your general skill as a hacker to a higher level.</p>
            <p>Click on the skull to continue to the first chapter of this introduction course!</p>
            <p class="center"><a href="#"><img alt="skull" src="images/course1skull.jpg" /></a></p>
°
        ,
        'chapter1' => <<<°
            <h1>Hackits Courses</h1>
            <h2>Course structure</h2>
            <p>All courses consist of one or more theory chapters, usually followed by some exercises that allow you to test your understanding of the theory. These exercises are always optional. Finally there is an exam for each course, which will show that you master the course contents and will earn you Hackits points! There is no time limit or penalty for reading a course or doing an exam, so no need to stress.</p>
            <p>At the left of the screen you see how the course is structured, and you can select a chapter/exercise to display and an exam link at the bottom of the list. Usually you will find links to the next part at the bottom of a page as well. At the top of the screen you see some tabs, currently you are in the 'Current Course' tab of the Courses system. At any time you can click on another tab to check out its contents, as long as you dont select a different course from the overview or refresh the page, your 'Current Course' tab will stay the same as when you left it.</p>
            <h2>Logging in</h2>
            <p>We advise that you first log in to the <a href="http://www.hackits.be/forum/" target="new">Hackits forum</a> before using the Courses system, because it will allow you to view which courses you completed in the overview, and it will allow the courses system to award you personally with points when completing an exam. You can see if you are logged in by checking out the top bar of the Courses page, which should say 'Logged in as: ' followed by your forum account name. If you submit an exam without being logged in, a warning will be displayed telling you to log in to the forum in a different browser tab or window, no need to fill in the exam again.</p>
            <h2>Difficulty</h2>
            <p>Each course has a difficulty level assigned to it by the Hackits team, the higher the difficulty the higher the score thats rewarded by completing the exam. Also at the start of a course there might be links to other courses as prerequisites listed, we advise that you complete those courses so you will have a much smoother learning curve. </p>
            <p>If you think you already know the contents of a course and want to skip right to the exam, feel free to do so, but keep in mind that there might be details in the theory that you didn't know about, or can use some refreshing in your brain. </p>
            <h2>Disclaimer</h2>
            <p>All information given to you in these courses is to be used for educational purposes only, and the hacking/cracking techniques described should be performed on your own systems, or on systems where you have explicit permission from its owner to use them for these purposes. Not following these rules can result in very large fines or even jailtime in some countries.</p>
            <p class="center"><a href="#/course/General/Internet+Relay+Chat+%28IRC%29">>> Next Chapter >></a></p>
°
        ,
        'chapter2' => <<<°
            <h1>More about courses</h1>
            <h2>Getting help</h2>
            <p>The best place to get help on a course is the <a href="http://www.hackits.be/forum/index.php?board=12.0">Courses Help section</a> in the forum. In here, other hackits members and staff can help you out and think along. The questions and remarks you give us, can help us make the courses better for everybody!</p>
            <p>If you need realtime communication then IRC might be a good choice instead, but keep in mind that the author of the course might not be available or on IRC at all.</p>
            <h2>Feedback</h2>
            <p>If something about the Course system is not working like it should, or isn't being displayed properly in your browser, or the actual content of the course is outdated or false, there are a few ways to get in contact with the Hackits team.</p>
            <p>First of all, security-related issues should always be communicated privately to one of the Hackits <a href="http://www.hackits.be/forum/index.php?action=mlist;sort=id_group;start=0">Administrators</a>, either trough a private message on the forum, or a query on IRC.</p>
            <p>Technical issues or styling (HTML/CSS) issues are probably best discussed with the author of the Courses system, Sling. He is usually available on IRC but you can of course <a href="http://www.hackits.be/forum/index.php?action=pm;sa=send;u=2">PM</a> him on the Forum as well.</p>
            <p>All other feedback can be given publically in the <a href="http://www.hackits.be/forum/index.php?board=11.0">right section in the Forum</a>.</p>
            <h2>Submitting your own course</h2>
            <p>If you want to share your knowledge about a certain topic that hasn't already been covered in a course, feel free to submit your own tutorial on it to <a href="http://www.hackits.be/forum/index.php?topic=11.0">the forum</a>. Staff will check it out and if it meets the quality standards for a course, we will try to get in contact with you to create a new course! If you aren't sure if the topic has been covered or if your idea is suitable for a course, just join us on IRC and we can have a chat!</p>
            <h2>Final words</h2>
            <p>This is all we have to tell you about the courses system itself, head over to the <a href="#">exercise</a> to see how an example exercise looks.</p>
            <p>Welcome again and have a great learning experience!</p>
°
        ,
        'exercise1' => <<<°
            <h3>Exercise 1:</h3>
            <p>Exercises are small tests you can do yourself to see if you understood the contents of the course. Each exercise has an answer that can be revealed by clicking on the 'Reveal Answer' button.</p>
            <p>Now it would be a bit silly to have an exercise for this course, but we can at least show you how an exercise would look like. So here it goes: the exercise for this course is to reveal the answer to this exercise!</p>
            <div class="revealbutton" onClick="$('#answer1').show(); $('.revealbutton').hide(); ">Reveal Answer</div>
            <div class="answer" id="answer1">
                <p>Well done, you revealed the answer!</p>
                <p>This is the only exercise for this course, think you are ready for the exam? <a href="#">Click here</a> to check it out!</p>
            </div>
°
        ,
        'exam' => <<<°
            <h2>Exam Time!</h2><br />
            $msg
            <form id="examnform" name="examnform" method="post" action="">
                <div class="question">
                    <h3>Question 1</h3><br />
                    <p>Why should I do any courses?</p>
                    <input type="radio" value="A" id="radio11" name="1" /><label for="radio1">For fun and for learning</label><br />
                    <input type="radio" value="B" id="radio12" name="1" /><label for="radio2">They help me with challenges and give Hackits points</label><br />
                    <input type="radio" value="C" id="radio13" name="1" /><label for="radio3">All of the above!</label><br />
                </div>
                <div class="question">
                    <h3>Question 2</h3><br />
                    <p>What should I do when I find a security vulnerability that allows me to complete any course?</p>
                    <input type="radio" value="A" id="radio21" name="2" /><label for="radio1">Dont mention it, I could get the highest score in the ranking!</label><br />
                    <input type="radio" value="B" id="radio22" name="2" /><label for="radio2">Make a new topic on the forum to warn everybody</label><br />
                    <input type="radio" value="C" id="radio23" name="2" /><label for="radio3">Send a private message to one of the Administrators</label><br />
                </div>
                <div id="examnsubmit">
                    <button>Submit</button>
                </div>
            </form>
°
    )
);
/*
<div id="coursenavigation">
    <ol class="tree">
        <li class="file"><a data-contentid="default" href="#/course/General/Intro+to+Hackits+Courses/Introduction">Introduction</a></li>
        <li>
            <label for="theory">Theory</label><input type="checkbox" checked id="theory" />
            <ol>
                <li class="file"><a data-contentid="chapter1" href="#/course/General/Intro+to+Hackits+Courses/Hackits+Courses">Hackits Courses</a></li>
                <li class="file"><a data-contentid="chapter2" href="#/course/General/Intro+to+Hackits+Courses/More+about+courses">More about courses</a></li>
            </ol>
        </li>
        <li>
            <label for="exercises">Exercises</label> <input type="checkbox" checked id="exercises" />
            <ol>
                <li class="file"><a data-contentid="exercise1" href="#/course/General/Intro+to+Hackits+Courses/Exercise+1">Exercise 1</a></li>
            </ol>
        </li>
        <li class="file"><a data-contentid="examn" href="#/course/General/Intro+to+Hackits+Courses/Exam">Exam</a></li>
    </ol>
</div>

<div id="coursecontent">
	<div id="default">
	</div>
	<div id="chapter1">
	</div>
	<div id="chapter2">
	</div>
	<div id="exercise1">
	</div>
	<div id="examn">
	</div>
</div>
/*
