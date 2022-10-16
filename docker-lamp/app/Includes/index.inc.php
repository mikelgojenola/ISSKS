<?php
session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if (isset($_SESSION["izenAbizen"])){
        if(empty($_POST["jokoIzena"]) || empty($_SESSION["izenAbizen"])){
            header("location: ../index.php?error=emptyinputbilatu");
            exit();
        }
        jokoaNireZerrendaraGehitu($conn, $_SESSION["izenAbizen"], $_POST["jokoIzena"]);
    }
    else{
        header("location: ../index.php?error=ezzaudelogeatuta");
    }