<?php
 header("X-Content-Type-Options: 'nosniff'");
 header_remove("X-Powered-By");
 session_start();

 if(isset($_POST["submit"])){
    $username = $_POST["izenAbizen"];
    $pwd = $_POST["pasahitza"];
       
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    trafikoaEguneratu($conn);
    if(getLogIndex2($conn) % 10 === 0){
        if(time() - $_SESSION["azken10log"] < 10){
            header("location: ../trafikoa.php");
            exit();
        }
    }

    $index = getLogIndex($conn);

    $errorea = "ondo";
    if(pasahitzaKonprobatu($conn, $username, $pwd) === false){
        $errorea = "wrongpass";
    }
    $uidExists = userExists($conn, $username, $pwd);
    if($uidExists === false){
        $errorea = "wronguser";
    }
    if(emptyInputLogin2($username, $pwd) === TRUE) {
        $errorea="emptyinput";
    }
    
    logSartu($conn, $index, $username, $pwd, $errorea);

    if($errorea !== "ondo"){
        if(hirugarrenAldiz($conn, $username) === TRUE){
            header("location: ../kanporatu.php");
            exit();
        }
    }

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
