<?php

require "views/functions.php";

if (isset($_POST['username'])){

    $username= $_POST['username'];
    $password = $_POST['password'];
    $title = $_POST['title'];
    $asUsers = file_get_contents("users.txt");
    $ajUsers = json_decode($asUsers);
    //
    $newUser = new stdClass();

    $newUser->id = getGUID();
    $newUser->username = $username;
    $newUser->password = $password;
    $newUser->title = $title;
    $newUser->admin = 1;
    $newUser->events=[];


    array_push($ajUsers , $newUser);


    $asUsers = json_encode($ajUsers);
    file_put_contents("users.txt", $asUsers);

    header("Location: index.php?page=displayUsers");


}

$content = "<div class=\"wdw-createUser\">
    <form method='post'>

        <div class=\"wdw-createEvent-InputArea\">
            <label>Add a new admin account</label>
            <input type=\"text\" class=\"createUser form-control\" id=\"lbl-username\" name=\"username\" placeholder='username'>
            <input type=\"text\" class=\"createUser form-control\" id=\"lbl-password\" name=\"password\" placeholder='password'>
            <input type='text' class='createUser form-control' name='title' placeholder='title'> 
            <input type=\"submit\" class=\"btn btn-primary\" id=\"btn-submitEvent\" value=\"Add Admin\">
        </div>
       

    </form>
";