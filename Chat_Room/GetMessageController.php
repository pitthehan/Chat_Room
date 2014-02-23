<?php

require_once 'MessageService.class.php';

header("content-type:text/xml;charset=utf-8");
header("Cache-Control: no-cache");

$receiver = $_POST['receiver']; //not $receiver
$sender = $_POST['sender'];
//file_put_contents("d:/mylog.log", $sender."-".$receiver."\r\n",FILE_APPEND);
$messageService = new MessageService();
$mesList = $messageService->getMessage($receiver, $sender);
//file_put_contents("d:/mylog.log", "news--".$mesList."\r\n",FILE_APPEND);
echo $mesList;
?>