<?php
session_start();
if ($_SESSION["user"]){
    $productId    = $_POST["productId"];

    $saProducts = file_get_contents("../products.txt");
    $jaProducts = json_decode($saProducts);

    for ($i = 0; $i <count($jaProducts); $i++){
        if($jaProducts[$i]->id == $productId){
            array_splice($jaProducts, $i, 1);
        }
    }

    $saProducts = json_encode($jaProducts);

    file_put_contents("../products.txt", $saProducts);

    echo '{"status":"ok"}';
}
