<?php

if(isset($_POST["submit"])){
    
    $izena=$_POST["izenAbizen"];
    $NAN=$_POST["NAN"];
    $telefonoa=$_POST["telefonoa"];
    $jaiodata=$_POST["jaiotzeData"];
    $email=$_POST["email"];
    $paswd=$_POST["pasahitza"];
    $paswdrep=$_POST["RPasahitza"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($izena, $NAN, $telefonoa, $jaiodata, $email, $paswd, $paswdrep) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidNAN($NAN) !== false) {
        header("location: ../signup.php?error=invalidNAN");
        exit();
    }

    /*if(invalidData($jaiodata) !== false) {
        header("location: ../signup.php?error=invalidData");
        exit();
    }*/

    if(paswdMatch($paswd, $paswdrep) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if(userExists($conn, $izena, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

  createUser($conn, $izena, $NAN, $telefonoa, $jaiodata, $email, $paswd);
   
} 
else {
    header("location: ../signup.php");
    exit();
}