<?php
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST["bezeroAldatu"])){
    $izena = $_SESSION["izenAbizen"];
    if(!emptyDatuakAldatu($_POST["telefonoaAldatu"], $_POST["emailAldatu"], $_POST["pasahitzaAldatu"])){
        bezeroDatuakAldatu($conn, $izena, $_POST["telefonoaAldatu"], $_POST["emailAldatu"], $_POST["pasahitzaAldatu"]);
    }
    else{
        header("location: ../profila.php?error=emptyinputdatuak");
    }
}