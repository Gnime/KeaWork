<?php

$entry = $_GET["entry"];
$id = $_GET["id"];

if ($entry == "event"){
    deleteEntry("../events.txt",$id);
    header("Location: ../index.php?page=displayEvents");

} else if($entry == "partner")
{
    deleteEntry("../partners.txt",$id);
    header("Location: ../index.php?page=displayPartners");
}


function deleteEntry($fileName, $id)
{
    $sArray = file_get_contents($fileName);
    $jArray = json_decode($sArray);

    for ($i = 0; $i < count($jArray); $i++){
        if($jArray[$i]->id == $id){
            array_splice($jArray, $i, 1);
        }
    }

    file_put_contents($fileName,json_encode($jArray));
}
