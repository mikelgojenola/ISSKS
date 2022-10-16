<?php
    include_once 'header.php';
?>
<section class = "wrapper">
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
        <form action ='Includes/profila.inc.php' method='post'>
            <input type='text' name='izenaAldatu' placeholder='Sartu izen berria...'>
            <button type='submit' name='izenaAldatuBtn'>Aldatu izena</button>

            <input type='text' name='NANAldatu' placeholder='Sartu NAN berria...' onblur="konpNAN(this.value)">
            <button type='submit' name='NANAldatuBtn'>Aldatu NAN</button>

            <input type='text' name='telefonoaAldatu' placeholder='Sartu telefono berria...'>
            <button type='submit' name='telefonoaAldatuBtn'>Aldatu telefonoa</button>

            <input type='text' name='jaioDataAldatu' placeholder='Sartu jaiotze data berria...'>
            <button type='submit' name='jaioDataAldatuBtn'>Aldatu jaiotze-data</button>

            <input type='text' name='emailAldatu' placeholder='Sartu email berria...'>
            <button type='submit' name='emailAldatuBtn'>Aldatu emaila</button>

            <input type="password" name="pasahitzaAldatu" placeholder="Sartu pasahitz berria...">
            <button type="submit" name="pasaAldatuBtn">Aldatu pasahitza</button>
        </form>
    
    <?php
    include_once 'footer.php';
    ?>