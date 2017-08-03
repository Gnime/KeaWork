<?php
$id             = $_POST["id"];
$name           = $_POST["eventname"];
$image          = $_POST["image"];
$date           = $_POST["date"];
$location       = $_POST["location"];
$theme          = $_POST["theme"];
$description    = $_POST["description"];
$capacity       = $_POST["capacity"];
$partner        = $_POST["partner"];
$responsible    = $_POST["responsible"];

$users = file_get_contents("users.txt");
$ajUsers = json_decode($users);

if(isset($_POST["editEvent"]))
{
    $id             = $_POST["id"];
    $name           = $_POST["eventname"];
    $image          = $_POST["image"];
    $date           = $_POST["date"];
    $location       = $_POST["location"];
    $theme          = $_POST["theme"];
    $description    = $_POST["description"];
    $capacity       = $_POST["capacity"];
    $partner        = $_POST["partner"];
    $responsible    = $_POST["responsible"];

    $asEvents = file_get_contents("events.txt");
    $ajEvents = json_decode($asEvents);

    foreach($ajEvents as $jEvent)
    {
        if($jEvent->id == $id)
        {
            $jEvent->eventname = $name;
            $jEvent->image = $image;
            $jEvent->responsible = $responsible;
            $jEvent->partner = $partner;
            $jEvent->location = $location;
            $jEvent->theme = $theme;
            $jEvent->description = $description;
            $jEvent->date = $date;
            $jEvent->capacity = $capacity;

            $asEvents = json_encode($ajEvents);
            file_put_contents("events.txt", $asEvents);
            header("Location: index.php");

        }
    }


}


$content = "<div class=\"wdw-createEvent\">
    <form method='post'>

        <div class=\"wdw-createEvent-InputArea\">
            <label>Name of the Event:</label>
            <input value='$name' type=\"text\" class=\"createEvent form-control\" id=\"lbl-nameEvent\" name='eventname'>
             <input name='id' type='hidden' value='$id'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Location of the Event:</label>
            <input value='$location' type=\"text\" class=\"createEvent form-control\" id=\"lbl-localEvent\" name='location'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Theme of the Event:</label>
            <input value = '$theme' type=\"text\" class=\"createEvent form-control\" id=\"lbl-themeEvent\" name='theme'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Date of the Event:</label>
            <input value='$date' type=\"text\" class=\"createEvent form-control\" id=\"lbl-dateEvent\" name='date'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Description of the Event:</label>
            <input value='$description' type=\"text\" class=\"createEvent form-control\" id=\"lbl-descriptionEvent\" name='description'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Partner of the Event:</label>
            <input value='$partner' type=\"text\" class=\"createEvent form-control\" id=\"lbl-partnerEvent\" name='partner'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label> Capacity of the Event:</label>
            <input value='$capacity' type=\"text\" class=\"createEvent form-control\" id=\"lbl-capacityEvent\" name='capacity'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Manager of the Event:</label>
            <select name='responsible' id=\"drp-users\">";

foreach ($ajUsers as $jUser) {
        $content .= "<option value='$jUser->username'>$jUser->username</option>";
    };


$content .="<!--<input type=\"text\" class=\"createEvent form-control\">-->
            </select>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <label>Picture of the Event:</label>
            <input value='$image' type=\"text\" class=\"createEvent form-control\" id=\"lbl-pictureEvent\" name='image' >
            <input name='editEvent' value='true' type='hidden'>
        </div>
        <div class=\"wdw-createEvent-InputArea\">
            <input type=\"submit\" class=\"btn btn-primary\" id=\"btn-submitEvent\" value=\"Edit event\">
        </div>

    </form>

</div>";
