<?php

require "views/functions.php";

$users = file_get_contents("users.txt");
$ajUsers = json_decode($users);



if (isset($_POST['nameOfEvent'])){

    $nameOfEvent = $_POST['nameOfEvent'];
    $locationOfEvent = $_POST['locationOfEvent'];
    $themeOfEvent = $_POST['themeOfEvent'];
    $dateOfEvent = $_POST['dateOfEvent'];
    $descriptionOfEvent = $_POST['descriptionOfEvent'];
    $partnerOfEvent = $_POST['partnerOfEvent'];
    $capacityOfEvent = $_POST['capacityOfEvent'];
    $pictureOfEvent = $_POST['pictureOfEvent'];
    $responsibleForEvent = $_POST['managerOfEvent'];

    $asEvents = file_get_contents("events.txt");
    $ajEvents= json_decode($asEvents);

    $newEvent = new stdClass();
    $newEvent->id = getGUID();
    $newEvent->eventname = $nameOfEvent;
    $newEvent->location = $locationOfEvent;
    $newEvent->theme = $themeOfEvent;
    $newEvent->date = $dateOfEvent;
    $newEvent->description = $descriptionOfEvent;
    $newEvent->partner = $partnerOfEvent;
    $newEvent->capacity = $capacityOfEvent;
    $newEvent->image = $pictureOfEvent;
    $newEvent->responsible = $responsibleForEvent;

    array_push($ajEvents , $newEvent);

    $asEvents = json_encode($ajEvents);
    file_put_contents("events.txt", $asEvents);
    header("Location: index.php?page=displayEvents");


}

$content = "<div class=\"wdw-createEvent\">
    <form method='post'>

        <div class=\"wdw-createEvent-InputArea\">
            <label>Name of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-nameEvent\" name='nameOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Location of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-localEvent\" name='locationOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Theme of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-themeEvent\" name='themeOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Date of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-dateEvent\" name='dateOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Description of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-descriptionEvent\" name='descriptionOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Partner of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-partnerEvent\" name='partnerOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label> Capacity of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-capacityEvent\" name='capacityOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Manager of the Event:</label>
            <select id=\"drp-users\" name='managerOfEvent'>";

foreach ( $ajUsers as $jUser) {
    $content .= "<option value='$jUser->username'>$jUser->username</option>";
};


$content .="<!--<input type=\"text\" class=\"createEvent form-control\">-->
            </select>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Picture of the Event:</label>
            <input type=\"text\" class=\"createEvent form-control\" id=\"lbl-pictureEvent\" name='pictureOfEvent'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <input type=\"submit\" class=\"btn btn-primary\" id=\"btn-submitEvent\" value=\"Add event\">
        </div>

    </form>

</div>";
