<?php

if(isset($_POST["jokoSartu"])){
    
    $jIzena=$_POST["jIzena"];
    $pegi=$_POST["pegi"];
    $info=$_POST["info"];
    $prezioa=$_POST["prezioa"];
    $jData=$_POST["jData"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyJokoaGehitu($jIzena, $pegi, $info, $prezioa, $jData) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    jokoaSartu($conn, $jIzena, $pegi, $info, $prezioa, $jData);
}