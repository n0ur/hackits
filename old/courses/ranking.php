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
// File:        courses/ranking.php                                              //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Displays a hackits members list sorted by course score           //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

    function get_course_score($courseId, $completedCount){
        return 100 / ($completedCount + 1); // TODO: score algorithm
    }
    function get_course_rank($courseId, $score){
        return 1;// TODO: rank algorithm
    }

    $cols = array(
        '#', 'course', 'completed', 'score', 'rank'
    );
    $table = array();
    if($tree) foreach($tree as $categoryId => $courses) {
        $table[] = sprintf('<thead><tr><th colspan="%s">%s</th></tr>', count($cols), $categories[$categoryId]);
        $table[] = count($courses) > 0
            ? sprintf('<tr><td>%s</td></tr></thead><tbody>', implode('</td><td>', $cols))
            : '</thead><tbody>';
        
        foreach($courses as $index => $course){
            $completedCount = $db->count('
                `hackits_courseresults`
                WHERE courseid = :courseid
                  AND finished IS NULL', array(':courseid' => $course['id']));
            $score = get_course_score($course['id'], $completedCount);
            $rank = get_course_rank($course['id'], $score);
            $table[] = sprintf('<tr><td>%s</td></tr>', implode('</td><td>', array(
                $index + 1,
                $course['title'],
                $completedCount,
                $score,
                $rank
            )));
        }
        if(count($courses) == 0){
            $table[] = sprintf('<tr><td colspan="%s">%s</td></tr>', count($cols), "No courses available");
        }
        $table[] = '</tbody>';
    }
    echo '<table class="table table-condensed table-bordered">'.implode('', $table).'</table>'


?>
