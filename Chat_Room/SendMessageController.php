<?php

require_once 'MessageService.class.php';
//get info
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$con = $_POST['con'];
//file_put_contents("d:/mylog.log", $sender."-".$receiver."-".$con."\r\n",FILE_APPEND);
$messageService = new MessageService();
$res = $messageService->addMessage($sender, $receiver, $con);

if ($res == 1) {
    
} else {
    echo "failed";
}
?>