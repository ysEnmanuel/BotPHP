<?php
    date_default_timezone_set("America/Lima");
    
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    
    $chat_id = $update["message"]["chat"]["id"];
    $username = $update["message"]["chat"]["username"];
    $message = $update["message"]["text"];

    if($message == "/s"){
        $number = rand(666,999);
        send_message($chat_id, $number);
    }

    if($message == "/time"){
        $masa = date("d/m/y h:i a", time());
        send_message($chat_id, $masa);
    }
    
    function send_message($id, $msg){
        $text = urlencode($msg);
        file_get_contents("https://api.telegram.org/bot5243109805:AAESxkazRdWTgCAiYY0A_9npQScCbYYUapY/sendMessage?chat_id=1054154613&text=$text");
    }
    
?>
