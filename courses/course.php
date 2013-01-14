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
<ul class="unstyled tree span3">
<?
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $course = isset($_GET['course']) ? $_GET['course'] : null;
    $chapter = isset($_GET['chapter']) ? $_GET['chapter'] : null;
    //TODO: implement static pages for non-js browsers (via url rewriting)
    $mincourseid = 0;
    $maxcourseid = 100000;

	$selectCourse = "<p class=\"center\"><img alt=\"Y U NO GIVE ID\" src=\"images/yuno.png\" /><br /><br />No active course, select a valid course from the navigation on the left!</p>";

    foreach($categories as $id => $name){
        echo '<li class="level0"><i class="icon-folder-open"></i><span class="underline">'. urlencode($name) .'</span>';
        if(count($tree[$id]) > 0){
            echo '<ul class="unstyled">';
            foreach($tree[$id] as $course){
                echo '<li class="level1"><i class="icon-folder-open"></i><span class="underline">'.$course['title'].'</span>';
                echo '<ul class="unstyled">';

                $filename = "courses/course".$course['id'].".php";
                if(is_readable($filename)){
                    $courseData = include($filename);
                }
                if($courseData['nav']) foreach($courseData['nav'] as $chapterType => $chapters){
                    if($chapters) foreach($chapters as $contentId => $chapterName){
                        echo '<li>';
                        switch($chapterType) {
                            case 'default': 
                                echo '<i class="icon-file"></i>'; break;
                            case 'exercises':
                                echo '<i class="icon-tasks"></i>'; break;
                            case 'exam':
                                echo '<i class="icon-certificate"></i>'; break;
                        }
                        echo '<a href="#">'.$chapterName.'</a></li>';
                    }
                }
                echo '</ul></li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
?>
</ul><!-- end ul class tree -->
    
<div class="span8 courseContent"><?php echo $selectCourse; ?></div>