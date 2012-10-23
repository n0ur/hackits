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
// File:        courses/course.php                                               //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Loads course file specified by $_GET['id']                       //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

?>
<div id="course">
<?
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $course = isset($_GET['course']) ? $_GET['course'] : null;
    $chapter = isset($_GET['chapter']) ? $_GET['chapter'] : null;
    //TODO: implement static pages for non-js browsers (via url rewriting)
    $mincourseid = 0;
    $maxcourseid = 100000;

	$selectCourse = "<p class=\"center\"><img alt=\"Y U NO GIVE ID\" src=\"images/yuno.png\" /><br /><br />No active course, select a valid course from the navigation on the left!
	</p>";


    echo '<div id="coursenavigation">
            <ol class="tree">';

    foreach($categories as $id => $name){
        echo '<li><a href="/course/'.urlencode($name).'"><label for="'.urlencode($name).'">
                '.$name.'</label></a>
                <input type="checkbox" id="'.urlencode($name).'" />';
        if(count($tree[$id]) > 0){
            echo '<ol>';
        }
        foreach($tree[$id] as $course){
            echo '<li><a href="/course/'.urlencode($name)
                    .'/'.urlencode($course['title']).'"><label for="'.urlencode($course['title']).'">
                    '.$course['title'].'</label></a>
                    <input type="checkbox" id="'.urlencode($course['title']).'" />
                    <ol>';
            $filename = "courses/course".$course['id'].".php";
            if(is_readable($filename)){
                $courseData = include($filename);
            }
            if($courseData['nav']) foreach($courseData['nav'] as $chapterType => $chapters){
                if($chapters) foreach($chapters as $contentId => $chapterName){
                    //$chapterType class to style icons
                    echo '<li class="file '.$chapterType.'"><a
                            data-contentid="'.$contentId.'"
                            data-chapterid="'.$chapterName.'_'.$course['id'].'"
                            href="/course/'.urlencode($name)
                                .'/'.urlencode($course['title'])
                                .'/'.urlencode($chapterName).'">'.$chapterName.'
                            </a>
                            <script type="text/html" id="'.$chapterName.'_'.$course['id'].'">
                                '.$courseData['content'][$chapterType][$contentId].'
                            </script>
                        </li>';
                }
            }
            echo '</ol></li>';
        }
        if(count($tree[$id]) > 0){
            echo '</ol>';
        }
        echo '</li>';
    }
    echo '</ol><!-- end ol class tree -->
        </div><!-- end div id="coursenavigation" -->';

?>
    <div id="coursecontent"><?php echo $selectCourse; ?></div>
</div>
