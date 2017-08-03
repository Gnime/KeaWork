<?php
session_start();
if ($_SESSION["user"]){

    $productName  = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productIcon  = $_POST["productIcon"];

    $jProduct = new stdClass();

    if (!isset($_POST["productId"])){
        $jProduct->id = uniqid();
    } else {
        $jProduct->id = $_POST["productId"];
    }

    $prevCloseRand  = rand(15,500);
    $openRand       = rand(300,500);
    $volumeRand     = rand(1000, 99999);
    $marketCapRand  = rand(1000, 5000);
    $epsRand        = rand(0,100);
    $peRand         = rand(0,100);
    $r              = rand(128,255);
    $g              = rand(128,255);
    $b              = rand(128,255);
    $a              = 0.6;

    $jProduct->name  = $productName;
    $jProduct->price = $productPrice;
    $jProduct->icon  = $productIcon;
    $jProduct->color = "rgb(".$r.",".$g.",".$b.")";
    $jProduct->info  = array(
        "prevClose" =>  $prevCloseRand,
        "open"      =>  $openRand,
        "volume"    =>  $volumeRand,
        "marketCap" =>  $marketCapRand,
        "eps"       =>  $epsRand,
        "pe"        =>  $peRand
    );


    $asProducts = file_get_contents("../products.txt");
    $ajProducts = json_decode($asProducts);

    $productExists = false;

    foreach($ajProducts as $jSingleProduct){
        if($jSingleProduct->id == $jProduct->id){
            $jSingleProduct->name = $jProduct->name;
            $jSingleProduct->price = $jProduct->price;
            $jSingleProduct->icon = $jProduct->icon;
            $productExists = true;
            $sProduct = json_encode($jProduct);
            echo'[{"status":"ok", "product":"updated"},'.$sProduct.']';
        }
    }

    if(!$productExists){
        array_push($ajProducts, $jProduct);
        $sProduct = json_encode($jProduct);
        echo '[{"status":"ok", "product":"created"},'.$sProduct.']';
    }


    $asProducts = json_encode($ajProducts);

    file_put_contents("../products.txt", $asProducts);}






