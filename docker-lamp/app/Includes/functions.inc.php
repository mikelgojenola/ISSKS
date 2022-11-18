<?php
function emptyInputSignup($izenAbizen, $NAN, $tlf, $JaiotzeData, $email, $pasahitza, $RPasahitza){
    $result = false;
    if(empty($izenAbizen) || empty($NAN) || empty($tlf) || empty($JaiotzeData) || empty($email) || empty($pasahitza) || empty($RPasahitza)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidNAN($izena){
    $result = false;
    return $result;
}



function invalidData($izena){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $izena)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($izena){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $izena)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function paswdMatch($paswd, $paswdrep){
    $result = false;
    if($paswd !== $paswdrep){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function userExists($conn, $izena, $email){
    $sql = "SELECT * FROM bezeroa WHERE izenAbizen = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=izenahartuta");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $izena, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result= false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $izena, $NAN, $telefonoa, $jaiodata, $email, $paswd){
    $sql = "INSERT INTO bezeroa (izenAbizen,NAN,telefonoa,jaiotzeData, email, pasahitza) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpaswd = password_hash($paswd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssisss", $izena, $NAN, $telefonoa, $jaiodata, $email, $hashedpaswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
}

function jokoaSartu($conn, $izena, $pegi, $info, $prezioa, $jData){
    $sql = "INSERT INTO jokoa (izena,pegi,info,prezioa,jaurtiData) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../jokoak.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sisss", $izena, $pegi, $info, $prezioa, $jData);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../jokoak.php?error=none");
}

function logSartu($conn, $id, $izena, $pasahitza, $errorea){
    $sql = "INSERT INTO log (id, erabiltzailea, pasahitza, errorea) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../jokoak.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "isss", $id, $izena, $pasahitza, $errorea);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyInputLogIn($izenAbizen, $pasahitza){
    $result = false;
    if(empty($izenAbizen)){
        $result = true;
        header("location: ../index.php?error=emptyuser");
        exit();
    } else if(empty($pasahitza)) {
        $result = true;
        header("location: ../index.php?error=emptypass");
        exit();
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputLogIn2($izenAbizen, $pasahitza){
    $result = false;
    if(empty($izenAbizen)){
        $result = true;
    } else if(empty($pasahitza)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyJokoaGehitu($izena, $pegi, $info, $prezioa, $jData){
    if(empty($izena) || empty($pegi) || empty($info) || empty($prezioa) || empty($jData)){
        $result = true;
        header("location: ../jokoak.php?error=emptyinput");
        exit();
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyDatuakAldatu($telefonoa, $email, $pasahitza){
    if(empty($telefonoa) || empty($email) || empty($pasahitza)){
        $result = true;
        header("location: ../profila.php?error=emptyinputdatuak");
        exit();
    }
    else{
        $result = false;
    }
    return $result;
}

function pasahitzaKonprobatu($conn, $izena, $pwd){
    $uidExists = userExists($conn, $izena, $izena);
    
    if($uidExists === false){
        header("location: ../index.php?error=wronguser");
        exit();
    }

    $paswd = $uidExists["pasahitza"];
    $checkPwd = password_verify($pwd, $paswd);
    if($checkPwd === false){
        return false;
    }
    if($checkPwd === true){
        return true;
    }
}

function loginUser($conn, $izena, $pasahitza) {
    $uidExists = userExists($conn, $izena, $izena);
    
    if($uidExists === false){
        header("location: ../index.php?error=wronguser");
        exit();
    }

    $pwd = $uidExists["pasahitza"];
    $checkPwd = password_verify($pasahitza, $pwd);

    if($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["izenAbizen"] = $uidExists["izenAbizen"];
        $_SESSION["NAN"] = $uidExists["NAN"];
        $_SESSION["telefonoa"] = $uidExists["telefonoa"];
        $_SESSION["jaiotzeData"] = $uidExists["jaiotzeData"];
        $_SESSION["email"] = $uidExists["email"];
        $_SESSION["pasahitza"] = $uidExists["pasahitza"];
        header("location: ../index.php");
        exit();
    }
    header("location: ../index.php?error=pasodetodo");
        exit();
}

function bezeroDatuakAldatu($conn, $izena, $telefonoa, $email, $pasahitza){
    if(!empty($telefonoa)){
        bezeroTelefonoaAldatu($conn, $telefonoa, $izena);
    }
    if(!empty($email)){
        bezeroEmailAldatu($conn,$email, $izena);
    }
    if(!empty($pasahitza)){
        bezeroPasahitzaAldatu($conn,$pasahitza, $izena);
    }
    header("location: ../profila.php");
}

function bezeroIzenaAldatu($conn, $izenBerria, $izena){
    if(userExists($conn, $izenBerria, "") === false){
        $sql = "UPDATE bezeroa
        SET izenAbizen = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $izenBerria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["izenAbizen"]=$izenBerria;
        header("location: ../profila.php?error=none");
    }
    else{
        header("location: ../profila.php?error=izenaezerabilgarri");
    }
}

function bezeroNANAldatu($conn, $NANBerria, $izena){
        $sql = "UPDATE bezeroa
        SET NAN = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $NANberria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["NAN"]=$NANBerria;
        header("location: ../profila.php?error=none");
}

function bezeroTelefonoaAldatu($conn, $telefonoBerria, $izena){
        $sql = "UPDATE bezeroa
        SET telefonoa = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $telefonoBerria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["telefonoa"]=$telefonoBerria;
        header("location: ../profila.php?error=none");
}

function bezeroJaioDataAldatu($conn, $JaioDataBerria, $izena){
        $sql = "UPDATE bezeroa
        SET jaiotzeData = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $JaioDataBerria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["jaiotzeData"]=$JaioDataBerria;
        header("location: ../profila.php?error=none");
}

function bezeroEmailAldatu($conn, $emailBerria, $izena){
        $sql = "UPDATE bezeroa
        SET email = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $emailBerria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["email"]=$emailBerria;

        header("location: ../profila.php?error=none");
}

function bezeroPasahitzaAldatu($conn, $pasahitzBerria, $izena){
        $sql = "UPDATE bezeroa
        SET pasahitza = ? 
        WHERE izenAbizen= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $pasahitzBerria, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["pasahitza"]=$pasahitzBerria;
        header("location: ../profila.php?error=none");
}

function jokoIzenakInprimatu($conn){
    $sql = "SELECT izena, info FROM jokoa";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../jokoak.php?error=stmtfailed");
        exit();
    }
    //mysqli_stmt_bind_param($stmt, "isisss", $jID, $izena, $pegi, $info, $prezioa, $jData);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = $result->fetch_assoc()) {
        echo "<h2>";
        echo $row['izena']."<br>";
        echo "</h2>";
        echo "<p>";
        echo $row['info']."<br>";
        echo "</p>";
        echo "<br>";
    }
        mysqli_stmt_close($stmt);
    //header("location: ../jokoak.php?error=none");
}

function nireJokoakInprimatu($conn, $bezeroIzena){
    $sql = "SELECT gustoko.jokoIzen, jokoa.info FROM gustoko, jokoa WHERE gustoko.bezeroIzen = ? AND gustoko.jokoIzen = jokoa.izena";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $bezeroIzena);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = $result->fetch_assoc()) {
        echo "<h2>";
        echo $row['jokoIzen']."<br>";
        echo "</h2>";
        echo "<p>";
        echo $row['info']."<br>";
        echo "</p>";
        echo "<br>";
    }
        mysqli_stmt_close($stmt);
}

function jokoaDago($conn, $jIzena){
    $sql = "SELECT * FROM jokoa WHERE izena = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=jokoaezdago");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $jIzena);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result= false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function getLogIndex($conn){
    $sql = "SELECT MAX(id) FROM log";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=jokoaezdago");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($resultData === null){
        return 1;
    }
    while ($row = $resultData->fetch_assoc()) {
        return $row['MAX(id)']+1;
    }
}

function jokoaNireZerrendaraGehitu($conn, $bIzena, $jIzena){
    $jokoaExists = jokoaDago($conn, $jIzena);
    if($jokoaExists === false){
        header("location: ../index.php?error=jokoaezdago");
        exit();
    }
    $sql = "INSERT INTO gustoko (bezeroIzen, jokoIzen) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $bIzena, $jIzena);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
}

function jokoaAldatu($conn, $izena, $pegi, $info, $prezioa, $data){
        $sql = "UPDATE jokoa SET pegi = ?, info = ?, prezioa = ?, jaurtiData = ? WHERE izena= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "issss", $pegi, $info, $prezioa, $data, $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}

function jokoaEzabatu($conn, $izena){
    $sql = "DELETE FROM gustoko WHERE jokoIzen = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profila.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $izena);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}