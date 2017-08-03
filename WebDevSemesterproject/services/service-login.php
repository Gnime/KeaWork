<?php
session_start();


$username = $_GET["username"];
$password = $_GET["password"];


$saAdmins = file_get_contents("../admins.txt");
$jaAdmins = json_decode($saAdmins);


foreach($jaAdmins as $jAdmin){
    if($jAdmin->username == $username && $jAdmin->password == $password){
        $_SESSION["user"]=$jAdmin;
        $jAdmin->status = "ok";

        $asProducts = file_get_contents("../products.txt");

        $ajProducts = json_decode($asProducts);
        foreach($ajProducts as $jSingleProduct){
            $number = rand(-100, 100)/100;
            $jSingleProduct->price = $jSingleProduct->price + $number;
        }

        file_put_contents("../products.txt", $asProducts);

        $ajUsersProducts = array($jAdmin, $ajProducts);
        echo json_encode($ajUsersProducts);

        die;

    }
}
echo '{"status":"error"}';




