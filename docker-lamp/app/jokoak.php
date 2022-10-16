<?php
include_once 'header.php';
?>
<div>
<section class="profil-datuak">
    <h2>Jokoa gehitu</h2>
    <!--Hemen erabiltzaileari joku berri bat datu basean sartzeko aukera ematen diogu, parametro guztiak sartuz eta igoz -->
    <form action="Includes/jokoak.inc.php" method="post">
        Izena: <input type="text" id="jIzena" name="jIzena" placeholder="Izena sartu...">
        PEGI: <input type="text" id="pegi" name="pegi" placeholder="PEGI...">
        Deskripzioa: <input type="text" id="info" name="info" placeholder="Deskripzioa...">
        Prezioa: <input type="text" id="prezioa" name="prezioa" placeholder="Prezioa sartu...">
        Jaurtiketa-data: <input type="text" id="jData" name="jData" placeholder="Jaurtiketa-data...">
        <button type="submit" name="jokoSartu">Jokoa sartu</button>
    </form>
    </div>
<?php
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
    }
        if(isset($_POST["aldatu"])){
            /*jokoaDago metodoak jokoaren informazioa irakurtzeko erabili dugu eta segidan informazio hori zatitu egin dugu hainbat parametrotan
            Parametro horiek pantailaratu ditugu erabiltzaileak ikus ditzan */
            $row = jokoaDago($conn, $_POST["jokoIzena"]);
            $_SESSION["jokoIzena"] = $row['izena'];
            $info =$row['info'];
            $prezioa = $row['prezioa'];
            $pegi = $row['pegi'];
            $data = $row['jaurtiData'];
            echo "<section class='body'>";
            echo "<p>";
            echo "<h3> Izena: </h3>";
            echo $_SESSION["jokoIzena"];
            echo "<br><br>";
            echo "<h3> Deskripzioa: </h3>";
            echo $info;
            echo "<br><br>";
            echo "<h3> Prezioa: </h3>";
            echo $prezioa;
            echo "<br><br>";
            echo "<h3> PEGI: </h3>";
            echo $pegi;
            echo "<br><br>";
            echo "<h3> Jaurtiketa-data: </h3>";
            echo $data;
            echo "<br><br>";
            /*Erabiltzaileak joko bat aldatu nahi izatekotan, aurreko botoia sakatzean opzio berri hauek pantailaratuko ditugu
            Hauekin jokoaren atributuak aldatu ahal izango ditugu datu basean */
            echo "<section class='joko-datuak'>
            <form action='' method='post'>
            PEGI: <input type='text' id='pegi2' name='pegi2' placeholder='PEGI...'><br>
            Deskripzioa: <input type='text' id='info2' name='info2' placeholder='Deskripzioa...'><br>
            Prezioa: <input type='text' id='prezioa2' name='prezioa2' placeholder='Prezioa sartu...''><br>
            Jaurtiketa-data: <input type='text' id='jData2' name='jData2' placeholder='Jaurtiketa-data...'><br>
            <button type='submit' name='jokoAldatu'>Aldaketak gorde</button>
            </form>            </section>
            ";
            echo "</p>";
            echo "</section>";
        }
        if(isset($_POST["jokoAldatu"])){
            //echo $_SESSION["jokoIzena"];
            jokoaAldatu($conn, $_SESSION["jokoIzena"], $_POST["pegi2"], $_POST["info2"], $_POST["prezioa2"], $_POST["jData2"]);
        }
?>

<section class="profil-datuak">
    <h2>Jokoa aldatu</h2><br>

    <form action="" method="post">
        Sartu aldatu nahi duzun jokoaren izena:<input type="text" name="jokoIzena" placeholder="...">
        <button type="submit" name="aldatu">Jokoa bilatu</button>
    </form>
    <!--
        <form action="Includes/jokoak.inc.php" method="post">
            Izena: <input type="text" id="jIzena2" name="jIzena" placeholder="Izena sartu..." >
            PEGI: <input type="text" id="pegi2" name="pegi" placeholder="PEGI...">
            Deskripzioa: <input type="text" id="info2" name="info" placeholder="Deskripzioa...">
            Prezioa: <input type="text" id="prezioa2" name="prezioa" placeholder="Prezioa sartu...">
            Jaurtiketa-data: <input type="text" id="jData2" name="jData" placeholder="Jaurtiketa-data...">
            <button type="submit" name="jokoSartu">Jokoa sartu</button>
        </form>
        </div>
    -->
<?php

    if(isset($_GET["error"])){

        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
    }
?>


</section>


<?php
    include_once 'footer.php';
?>