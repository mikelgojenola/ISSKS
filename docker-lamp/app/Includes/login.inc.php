<?php

if(isset($_POST["submit"])){
    $username = $_POST["izenAbizen"];
    $pwd = $_POST["pasahitza"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) !== FALSE) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $pwd);
}
else{
    header("location../index.php");
    exit();
}