<?php

require_once 'SqlHelper.class.php';

class MessageService {

    //add info to database
    function addMessage($sender, $receiver, $con) {
        $sql = "insert into messages (sender,receiver,content,sendTime) values ('$sender','$receiver','$con',now())";
        //file_put_contents("d:/mylog.log",$sql,FILE_APPEND);
        $sqlHelper = new SqlHelper();

        return $sqlHelper->execute_dml($sql);
    }

    function getMessage($receiver, $sender) {
        $sql = "select * from messages where receiver='$receiver' and sender='$sender' and isReceived=0";
        //file_put_contents("d:/mylog.log", $sql."\r\n",FILE_APPEND);
        $sqlHelper = new SqlHelper();
        $array = $sqlHelper->execute_dql2($sql);
        //back information format
        //xml->json
        //$messageInfo="<meses><mesid>1</mesid><sender>tom</sender><receiver>hehan</receiver><con>hello</con><sendTime>2013-09-09</sendTime></meses>";
        $messageInfo = "<meses>";
        for ($i = 0; $i < count($array); $i++) {
            $row = $array[$i];
            $messageInfo.="<mesid>{$row['id']}</mesid><sender>{$row['sender']}</sender><receiver>{$row['receiver']}</receiver><con>{$row['content']}</con><sendTime>{$row['sendTime']}</sendTime>";
        }
        $messageInfo.="</meses>";
        //file_put_contents("d:/mylog.log", $messageInfo."\r\n", FILE_APPEND);
        //update isReceived
        $sql = "update messages set isReceived=1 where receiver='$receiver' and sender='$sender'";
        $sqlHelper->execute_dml($sql); //dml, not dql
        $sqlHelper->close_connect();
        return $messageInfo;
    }

}