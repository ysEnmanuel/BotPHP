<?php
    date_default_timezone_set("America/Lima");
    
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    
    $chat_id = $update["message"]["chat"]["id"];
    $username = $update["message"]["chat"]["username"];
    $message = $update["message"]["text"];
    $txt = 
    
    if($message == "/start"){
        send_message($chat_id, "Bienvenido @".$username." ".PHP_EOL." Este bot ha sido creado by @itsKyler666 1");
    }
    if($message == "/roll"){
        $number = rand(666,999);
        send_message($chat_id, $number);
    }
    if($message == "/time"){
        $masa = date("d/m/y h:i a", time());
        send_message($chat_id, $masa);
    }
    
    function send_message($id, $msg){
        $text = urlencode($msg);
        file_get_contents("https://api.telegram.org/bot2007046980:AAF9McJweixsNSkIs8ZHCvjkax4ICWCkOjA/sendMessage?chat_id=$id&text=$text");
    }
    
    
?>
