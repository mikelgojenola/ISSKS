<?php
    include_once 'header.php';
?>

    <section class="body">
        <!--Hasierako honekin, erabiltzailea logeatzen denean agurtuko dugu -->
        <?php
            if (isset($_SESSION["izenAbizen"])){
                echo "<p>Hello there " .$_SESSION["izenAbizen"]. "<br></p>";
            }
        ?>
    </section>
    <section class="index-intro">
            <h1>AUKERAN DAUDEN JOKUAK</h1>
        </section>

    <section class="index-categories">
        <div class = "index-categories-list">
            <!--Hemen beherago eskuragarri dauden jokoetatik bat hautatzeko aukera ematen diogu erabiltzaileari.
            Joku bat hemen hautatzerakoan, erabiltzailearen joku-zerrenda pertsonalean sartuko dugu -->
        <form action="Includes/index.inc.php" method="post">
            Sartu gustoko duzun jokoaren izena zure zerrendara gehitzeko:<input type="text" name="jokoIzena" placeholder="...">
            <button type="submit" name="gehitu">Listara gehitu</button>
            <br><br><br>
            <h1>Jokoak:</h1><br>
            <?php
                echo "<p>";
                jokoIzenakInprimatu($conn);//Honekin datu basean dauden joku guztiak bistaratuko ditugu
                echo "</p>";
            ?>
        </form>
        </div>
    </section>
    

<?php  
    include_once 'footer.php';
?>