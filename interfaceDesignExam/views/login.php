<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 22/05/2017
 * Time: 11:55
 */

$errorMessage = "";
if(isset($_GET["username"], $_GET["password"]))
{
    $asUsers = file_get_contents("../users.txt");
    $ajUsers = json_decode($asUsers);

    foreach($ajUsers as $jUser)
    {
        if($jUser->username == $_GET["username"] && $jUser->password == $_GET["password"])
        {
            session_start();
            $_SESSION["user"] = $jUser;
            header("Location: ../index.php");
        } else {
            $errorMessage = "<div>User not found</div>";
        }

    }

}

$content =
    "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Anvil</title>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <!-- Google font -->
    <link href=\"https://fonts.googleapis.com/css?family=Comfortaa:300,400,700\" rel=\"stylesheet\">
    <!-- Font Awesome -->
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" integrity=\"sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN\" crossorigin=\"anonymous\">
    <!-- Our stylesheet -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../style/style.css\">
    <!-- Bootstrap stylesheet -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <!--  Date and time CSS  -->
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <script src=\"../node_modules/sweetalert/dist/sweetalert.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../node_modules/sweetalert/dist/sweetalert.css\">
</head>


<div id=\"wdw-login-master\">
<div class=\"wdw-login-text\">
    <h1>Welcome to Anvil</h1>
    <h5>The best event system in town!</h5>
</div>
<div class=\"wdw-login\">
    <form method=\"get\">
        <input type=\"text\" name=\"username\" id=\"lbl-username\" class=\"form-control\" placeholder=\"username\">
        <input type=\"text\" name=\"password\" id=\"lbl-password\" class=\"form-control\" placeholder=\"password\">
        <input type=\"submit\" id=\"btn-login-submit\" class=\"btn btn-primary\" value=\"Login\">
        
    </form>
    <div class='login-error-message'><h5>$errorMessage</h5></div>
    <h3>Admin user : Username a , Password 1 . Regular user : Username b , Password 2</h3>
    </div>
    </div>

   
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
<script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
</body>
";
echo $content;


