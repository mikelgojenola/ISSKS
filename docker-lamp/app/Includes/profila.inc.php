<?php
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST["izenaAldatuBtn"])){
    bezeroIzenaAldatu($conn, $_POST["izenaAldatu"], $_SESSION["izenAbizen"]);
}
if(isset($_POST["NANAldatuBtn"])){
    bezeroNANAldatu($conn, $_POST["NANAldatu"], $_SESSION["izenAbizen"]);
}
if(isset($_POST["telefonoaAldatuBtn"])){
    bezeroTelefonoaAldatu($conn, $_POST["telefonoaAldatu"], $_SESSION["izenAbizen"]);
}
if(isset($_POST["jaioDataAldatuBtn"])){
    bezeroJaioDataAldatu($conn, $_POST["jaioDataAldatu"], $_SESSION["izenAbizen"]);
}
if(isset($_POST["emailAldatuBtn"])){
    bezeroEmailAldatu($conn, $_POST["emailAldatu"], $_SESSION["izenAbizen"]);
}
if(isset($_POST["pasaAldatuBtn"])){
    bezeroPasahitzaAldatu($conn, $_POST["pasahitzaAldatu"], $_SESSION["izenAbizen"]);
}


