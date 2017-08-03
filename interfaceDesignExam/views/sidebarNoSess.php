<?php
$user = $_SESSION["user"];
$userId = $user->id;

$sidebarcode = "<div id=\"wdw-sidebar\" class='$Color'>
        <div id=\"wdw-hello\">
            <h4>Welcome to Anvil</h4>
            <h5>The number one online platform for tech events</h5>
        </div>
        <div id=\"wdw-view-list\">
            <a href=\"index.php?page=displayEvents\"><h5>All Events</h5></a>
            <a href=\"index.php?page=displayPartners\"><h5>All Partners</h5></a>
          
        </div>
    </div>
            <div class=\"dropdown\">
          <button class=\"btn dropdown-toggle $Color\" type=\"button\" data-toggle=\"dropdown\">Menu
          <span class=\"caret\"></span></button>
          <ul class=\"dropdown-menu\">
            <li><a href=\"index.php?page=displayEvents\">All Events</a></li>
            <li><a href=\"index.php?page=displayPartners\">All Partners</a></li>
            <li><a class='$isShowing' href=\"index.php?page=displayUsers\">All Users</a></li>
            <li><a class='$notShowing' href='index.php?page=displayMyEvents'>My Events</a></li>
          </ul>
        </div>
        <div class='btn-login-wrapper'>
        <a class='btn-login' href='views/login.php'><h5>Log in</h5></a>
        </div>
    </div>";

?>