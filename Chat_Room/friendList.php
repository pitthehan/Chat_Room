<html>
    <head>
        <script type="text/javascript" src="my.js"></script>
        <script type="text/javascript">
            function change1(val, obj) {
                if (val == 'over') {
                    obj.style.color = "red";
                    obj.style.cursor = "hand";
                } else if (val == 'out') {
                    obj.style.color = "black";
                }
            }

            function openChatRoom(obj) {
                //open new window
                window.open("chatRoom.php?username=" + obj.innerText, "_blank");
            }
        </script>
    </head>
    <h1>Friend List</h1>
    <ul>
        <li onmouseover="change1('over', this)" onclick="openChatRoom(this)" onmouseout="change1('out', this)">He Han</li>
        <li onmouseover="change1('over', this)" onclick="openChatRoom(this)" onmouseout="change1('out', this)">Tom</li>
        <li onmouseover="change1('over', this)" onclick="openChatRoom(this)" onmouseout="change1('out', this)">John</li>
    </ul>
</html>