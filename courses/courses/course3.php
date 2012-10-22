<?php
$msg = !$loggedin ? $notloggedintext : '';
return array(
    'nav' => array(
        'default' => array(
            'chapter1' => 'How IRC works',
            'chapter2' => 'IRC Security',
        ),
        'exercises' => array(
            'exercise1' => 'Exercise 1',
        ),
        'exam' => array(
            'exam1' => 'Exam',
        )
    ),
    'content' => array(
        'default' => array(
            'index' => <<<°
                <h1>Internet Relay Chat (IRC)</h1>
                <p>Under construction!</p>
°
        ,
            'chapter1' => <<<°
                <p class="center">How IRC works</p>
°
        ,
            'chapter2' => <<<°
                <p class="center">IRC Security</p>
°
        ,
        ),
        'exercises' => array(
            'exercise1' => <<<°
                    <h3>Exercise 1:</h3>
                    <p>Nothing yet</p>
°
            ,
        ),
        'exam' => array(
            'exam1' => <<<°
                <h2>No Exam Time yet!</h2><br />
                <form id="examnform" name="examnform" method="post" action="">
                    <div class="question">
                        <h3>Question 1</h3><br />
                        <p>Nothing yet</p>
                        <input type="radio" value="A" id="radio1" name="1" /><label for="radio1">bla</label><br />
                        <input type="radio" value="B" id="radio2" name="1" /><label for="radio2">bla</label><br />
                        <input type="radio" value="C" id="radio3" name="1" /><label for="radio3">bla</label><br />
                    </div>
                </form>
°
        ),
    )
);

