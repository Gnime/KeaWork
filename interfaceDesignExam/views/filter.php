<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 23/05/2017
 * Time: 10:19
 */

$filter = $_GET["value"];
$asEvents = file_get_contents("events.txt");
$ajEvents = json_decode($asEvents);

$allFilterValues = array();
foreach($ajEvents as $jEvent)
{
    array_push($allFilterValues,$jEvent->$filter);
}
$uniqueFilterValues = array_unique($allFilterValues);

$content ="
        <div class='wdw-filtered-events'>
            <h4>Sorted by : $filter</h4>
            <div class='wdw-ordered-events'>".displayAllEvents($uniqueFilterValues, $ajEvents, $filter)."</div>
        </div>

";

function displayAllEvents($arrayOfFilters, $arrayOfEvents, $filter){
    $body="";
    foreach($arrayOfFilters as $singleFilter)
    {
        $body .= "
        <div class='filter'>
        <h4>$singleFilter :</h4>";
        foreach($arrayOfEvents as $singleEvent)
        {
            if($singleEvent->$filter == $singleFilter)
            {
                $body .="
                <a href='?page=displayEventDetails&amp;event_id=$singleEvent->id'>
                    <div class='event event-filtered'>
                        <div class='event-img-filtered'>
                            <img src='$singleEvent->image' class='img-circle' alt='event image'>
                        </div>
                        <div class='event-info'>
                            <div>
                                <h5>$singleEvent->eventname</h5>                     
                            </div>
                            <div>
                                <h5>$singleEvent->date</h5>                       
                            </div>
                        </div>
                    </div>
                </a>";
            }
        }
        $body .="</div>";
    }
    return $body;
}