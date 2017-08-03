 		<?php
session_start();
//if ($_SESSION["user"]){
    $asProducts = file_get_contents("../products.txt");

    $ajProducts = json_decode($asProducts);
//    sleep(1);
    foreach($ajProducts as $jSingleProduct){
        $number = rand(-100, 100)/100;
        $jSingleProduct->price = $jSingleProduct->price + $number;

    }

    $asProducts = json_encode($ajProducts);
    file_put_contents("../products.txt", $asProducts);


    echo $asProducts;
//} else {
//    echo "Restricted access";
//}
