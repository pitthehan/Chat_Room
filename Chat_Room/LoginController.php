<?php

$loginUser = $_POST['username'];
$pwd = $_POST['passwd'];

if ($pwd == "123") {
    //save info to session
    session_start();
    $_SESSION['loginuser'] = $loginUser;
    header("Location: friendList.php");
} else {
    header("Location: login.php");
}