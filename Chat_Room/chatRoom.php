<html>
    <head>
        <?php
        //get window.open username
        $username = $_GET['username'];

        //get loginname from session
        session_start();
        $loginuser = $_SESSION['loginuser'];
        ?>
        <script type="text/javascript" src="my.js" ></script>
        <script type="text/javascript">
            window.resizeTo(500, 400);

            window.setInterval("getMessage()", 1000);

            function getMessage() {
                var myXmlHttpRequest = getXmlHttpObject();
                if (myXmlHttpRequest) {
                    var url = "GetMessageController.php";
                    var data = "receiver=<?php echo $loginuser; ?>&sender=<?php echo $username; ?>";
                    myXmlHttpRequest.open("post", url, true);
                    myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    myXmlHttpRequest.onreadystatechange = function() {
                        if (myXmlHttpRequest.readyState == 4) {
                            if (myXmlHttpRequest.status == 200) {
                                //receive data
                                var mesRes = myXmlHttpRequest.responseXML;
                                //1. output con and sendTime
                                var cons = mesRes.getElementsByTagName("con");
                                var sendTimes = mesRes.getElementsByTagName("sendTime");
                                if (cons.length != 0) {
                                    for (var i = 0; i < cons.length; i++) {
                                        var str = "<?php echo $username; ?> says to <?php echo $loginuser ?> :" + cons[i].childNodes[0].nodeValue + " " + sendTimes[i].childNodes[0].nodeValue;
                                        $('mycons').value += str + "\r\n";
                                    }
                                }
                            }
                        }
                    }

                    myXmlHttpRequest.send(data)
                }
            }

            function sendMessage() {
                //create xmlHttpRequest object
                var myXmlHttpRequest = getXmlHttpObject();
                if (myXmlHttpRequest) {

                    var url = "SendMessageController.php";
                    //use php in js
                    var data = "con=" + $('con').value + "&receiver=<?php echo $username; ?>&sender=<?php echo $loginuser; ?>";
                    myXmlHttpRequest.open("post", url, true);
                    myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    myXmlHttpRequest.onreadystatechange = function() {

                        if (myXmlHttpRequest.readyState == 4) {
                            if (myXmlHttpRequest.status == 200) {
                            }
                        }
                    }

                    //send
                    myXmlHttpRequest.send(data);

                    $('mycons').value += "You say to <?php echo $username; ?> :"
                            + $('con').value + " " + new Date().toLocaleString() + "\r\n";
                }
            }
        </script>
    </head>

    <center>
        <h1>Chat Room (<font color='red'><?php echo $loginuser; ?></font> is chatting with <font color='red'><?php echo $username; ?></font>)</h1>
        <textarea rows="20" cols="50" id="mycons"></textarea><br/>
        <input type="text" style="width:200px" id="con"/>
        <input type="button" value="send message" onclick="sendMessage()"/>
    </center>
</html>