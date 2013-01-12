<header>
  <div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
      <div class="container">
        <ul class="nav">
          <li class="<? if(isCurrentPage($subdir.'/index.php')) echo 'active'; ?>">
            <a href="<? echo $subdir; ?>/index.php">Home</a>
          </li>
          <li class="<? if(isCurrentPage($forumdir.'/index.php')) echo 'active'; ?>">
            <a href="<? echo $forumdir; ?>">Forum</a>
          </li>
          <li class="<? if(isCurrentPage($challengesdir.'/index.php')) echo 'active'; ?>">
            <a href="<? echo $challengesdir; ?>">Challenges</a>
          </li>
          <li class="<? if(isCurrentPage($coursesdir.'/test.php')) echo 'active'; ?>">
            <a href="<? echo $coursesdir; ?>">Courses</a>
          </li>
          <li><? if(!$loggedin) { ?><a href="<? echo $forumdir.'/index.php?action=login'; ?>">Login</a><? }
          else { ?> Logged in as: <a href="forum/index.php?action=profile">[ <? echo $usernametext; ?> ]</a><? } ?></li>
        </ul>
        <ul class="nav pull-right">
          <li><a href="#"><? echo date('F d, o, h:i:s A'); ?></a></li>
        </ul>
      </div>
    </div>
  </div>
</header>