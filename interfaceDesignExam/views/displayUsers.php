<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 22/05/2017
 * Time: 15:55
 */

$asUsers = file_get_contents("users.txt");
$ajUsers = json_decode($asUsers);

$allUsers = "
    <h3 class='txt-showing'>All Users :</h3>
    <div class='wdw-users'>".displayAllUsers($ajUsers)."</div>
</div>
";

function displayAllUsers($ajUsers){
    $user="";
    foreach($ajUsers as $jUser)
    {
        $user .= "<div class='user'>
        <div class='user-info'>
            <h4>$jUser->username</h4>
            <p>Title: $jUser->title</p>
        </div>
        <div class='user-events'>
        <h5>Working on : $jUser->event</h5>
        </div>
    </div>";
    }
    return $user;
}

$content = $allUsers;