<?php
    include_once 'header.php';
?>
<section class = "wrapper">
    <!--Hemen logeatuta dagoen erabiltzailearen datu pertsonalak ikusgarri egongo dira-->
    <h3>Profila</h3>
    <section class="profil-datuak">
        <?php
            require_once 'Includes/dbh.inc.php';
            require_once 'Includes/functions.inc.php';
                
                echo "<p>";
                echo $_SESSION["izenAbizen"];
                echo "</p>";
                echo "<p>";
                echo $_SESSION["NAN"];
                echo "</p>";
                echo "<p>";
                echo $_SESSION["telefonoa"];
                echo "</p>";
                echo "<p>";
                echo $_SESSION["jaiotzeData"];
                echo "</p>";
                echo "<p>";
                echo $_SESSION["email"];
                echo "</p>";
                echo "<p>";
                echo $_SESSION["pasahitza"];
                echo "</p>";            
        ?>
    </section>
    <!--Hurrengo honekin logeatuta dagoen erabiltzaile batek bere datu batzuk aldatzeko aukera izango du -->
    <h3>Aldagarriak diren datuak:</h3><br>
    <section class="wrapper">
        <form action="Includes/profila.inc.php" method="post">
            Telefonoa: <input type="text" id="tlf" name="telefonoaAldatu" placeholder="Telefonoa aldatu..." onblur="konpTelefonoa(this.value)">
            email: <input type="text" id="email" name="emailAldatu" placeholder="email-a aldatu..." onblur="konpEmail(this.value)">
            Pasahitza: <input type="password" id="psw" name="pasahitzaAldatu" placeholder="Pasahitza aldatu...">
            <button type="submit" name="bezeroAldatu">Aldatu datuak</button>
        </form>
    </section>
    
    <?php
    include_once 'footer.php';
    ?>