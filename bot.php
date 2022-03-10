<?php
    date_default_timezone_set("America/Lima");
    
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    
    $chat_id = $update["message"]["chat"]["id"];
    $first_name = $update["message"]["chat"]["first_name"];
    $message = $update["message"]["text"];
    
    if($message == "/start"){
        send_message($chat_id, "Que Onda PA ".$first_name);
    }
    if($message == "/roll"){
        $number = rand(1,999);
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
