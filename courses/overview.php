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
// File:        courses/overview.php                                             //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: Description: Display all courses in the database in an overview  //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

?>
<?
  // Set category names and descriptions
  $categories = array(1 => 'General',
            2 => 'Networking',
            3 => 'Security',
            4 => 'Windows',
            5 => 'Linux',
            6 => 'Hardware',
            7 => 'Programming',
            8 => 'Internet',
            9 => 'Databases',
            10 => 'Cryptography');
  $description = array(1 => 'Courses related to the Hackits website itself and courses that don\'t specifically fit into one of the other categories.',
            2 => 'Networking Description',
            3 => 'Security Description',
            4 => 'Windows Description',
            5 => 'Linux Description',
            6 => 'Hardware Description',
            7 => 'Programming Description',
            8 => 'Internet Description',
            9 => 'Databases Description',
            10 => 'Cryptography Description');

  // Make database connection

  // make this an Affix?
  echo '<ul class="nav nav-tabs nav-stacked span2">';
  foreach($categories as $id => $name) {
    echo '<li><a href="#'.urlencode($name).'">'.urlencode($name).'</a></li>';
  }
  echo '</ul>';
  

  echo '<div class="span9">';
  $tree = array();
  // Display the courses
  foreach($categories as $id => $name) {
    $nrtotal = 0;
    $nrcompleted = 0;
    $courses = $db->getAll("SELECT * FROM `hackits_courses` WHERE `category`=:category", array(':category' => $id));
    $output = "";
    $tree[$id] = $courses;
  
    if($courses) foreach($courses as $index => $course) {
            $nrtotal++;
            $author = DEVMODE ? 'DEVMODE' : $db->getOne(
                "SELECT member_name FROM `smf_members` WHERE `id_member`=':id'",
                array(':id' => $course['author']));
            $finished = $db->getOne(
                "SELECT finished FROM `hackits_courseresults` WHERE `userid`=:userid AND `courseid`=:courseid",
                array(
                    ':userid' => $usernameid,
                    ':courseid' => $course['id']));
            if($finished) {
                $checked = "<em class=\"checked\"></em>";
                $nrcompleted++;
            } else {
                $checked = "";
            }
            $urlname = urlencode($course['title']);
            $output .= <<<°
                <tr>
                    <td class="check">$checked</td>
                    <td>{$course['title']}</td>
                    <td>{$course['points']}</td>
                    <td>{$course['level']}</td>
                    <td>{$author}</td>
                    <td>{$course['completed']}</td>
                </tr>
°;
    }
    echo "<h4 id=\"$name\"><span>$name</span><small>&nbsp;($nrcompleted/$nrtotal)</small></h4>";
    echo "<p>$description[$id]</p>";
    echo '<table class="table table-condensed table-bordered">';
    echo '<thead><tr><th width="10px"></th><th>Title</th><th>Points</th><th>Level</th><th>Author</th><th>Passed</th></tr></thead><tbody>';
    echo $output;
    echo '</tbody></table>';
  }
  echo '</div>';
?>