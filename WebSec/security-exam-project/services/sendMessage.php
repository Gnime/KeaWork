
<?php
$referer = $_SERVER["HTTP_REFERER"];
if ($referer !== "https://188.226.141.57/views/profile.php"){
    exit("unknown request origin");
} else {
    session_start();
    require "../protected/connection.php";
    require "../protected/functions.php";

    $message = $_POST["message"];
    $user = $_SESSION["user"];

    $message = htmlentities($message);

    $receiverId = "";
    if($user->host == ""){

        $receiverId = $user->id;

    }else{

        $receiverId = $user->host->id;

    }

    $senderId = $user->id;
    $messageId = getGUID();

    $allowed = array("{","}");
    $encodedId = str_replace($allowed, "", $messageId);

    $stmt = $connection->prepare("INSERT INTO message(Id,receiver_id,sender_id,content) VALUES(:id,:receiver,:sender,:message)");
    $stmt->bindValue(":id", $encodedId);
    $stmt->bindValue(":receiver", $receiverId);
    $stmt->bindValue(":sender", $senderId);
    $stmt->bindValue(":message", $message);
    $stmt->execute();

    echo '{"user":"' . htmlentities($user->username) . '","message":"' . $message . '"}';

}
