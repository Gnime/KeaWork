<?php
/**
 * Created by PhpStorm.
 * User: AndersBlack
 * Date: 22/05/2017
 * Time: 13.55
 */
// Report all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
$user = $_SESSION["user"];
$userId = $user->id;

$sidebarcode = "<div id=\"wdw-sidebar\" class='$Color'>
        <div id=\"wdw-hello\"><h4>Welcome ".$user->username."</h4></div>
        <div id=\"wdw-view-list\">
            <a href=\"index.php?page=displayEvents\"><h5>All Events</h5></a>
            <a href=\"index.php?page=displayPartners\"><h5>All Partners</h5></a>
            <a class='$isShowing' href=\"index.php?page=displayUsers\"><h5>All Users</h5></a>
            <a class='$notShowing' href='index.php?page=displayMyEvents&id=$userId'><h5>My Events</h5></a>
        </div>
        <div class='btn-logout-wrapper'><a href='views/logout.php'><h5>Log out</h5></a></div>
    </div>
            <div class=\"dropdown\">
          <button class=\"btn dropdown-toggle $Color\" type=\"button\" data-toggle=\"dropdown\">Menu
          <span class=\"caret\"></span></button>
          <ul class=\"dropdown-menu\">
            <li><a href=\"index.php?page=displayEvents\">All Events</a></li>
            <li><a href=\"index.php?page=displayPartners\">All Partners</a></li>
            <li><a class='$isShowing' href=\"index.php?page=displayUsers\">All Users</a></li>
            <li><a class='$notShowing' href='index.php?page=displayMyEvents'>My Events</a></li>
            <li><a href='index.php?page=logout'>Log out</a></li>
          </ul>
        </div>
        <div class='btn-admin-func $isShowing $Color'>+</div>
    <div class='admin-func grow'>
        <a class='btn btn-success form-control' href='index.php?page=createEvent'>Add Event</a>
        <a class='btn btn-success form-control' href='index.php?page=createUserProfile'>Add Admin</a>
    </div>
    </div>";

?>