<?php

$userId = $_GET["user_id"];
$user = $_SESSION["user"];

$asEvents = file_get_contents("events.txt");
$ajEvents = json_decode($asEvents);


$event="<h3 class='txt-showing'>My events : </h3>
        <div class='wdw-events'>";
foreach($user->events as $eventId)
{
    foreach($ajEvents as $jEvent)
    if($jEvent->id == $eventId){
        $event .= "
        <a href='?page=displayEventDetails&amp;event_id=$jEvent->id'>
            <div class='event'>
                <div style='background-image:url($jEvent->image)' class='event-img img-circle'></div>
                <div class='event-info'>
                    <div>
                        <h3>$jEvent->eventname</h3>                     
                    </div>
                    <div>
                        <h5>$jEvent->date</h5>                       
                    </div>
                </div>
            </div>
        </a>";

    }

}
$evetn .="</div>";
$content=$event;