<?php
    include_once 'header.php';
?>
    <!--Orri honek bi funtzio ditu: Erabiltzailearen joku-zerrenda bistaratzea, kolekzio moduko bat 
    Eta zerrenda horretatik jokoak ezabatzea (ez datubasetik)-->
    <section class="profil-datuak">
    <?php
    if(isset($_POST["ezabatu"])){
        jokoaEzabatu($conn, $_POST["jokoEzabatu"]);
    }
    ?>
    <form action="" method="post">
        Sartu zure zerrendatik ezabatu nahi duzun jokoaren izena:<input type="text" name="jokoEzabatu" placeholder="...">
        <button type="submit" name="ezabatu">Jokoa ezabatu</button>
    </form>
    </section>
    <section class="joko-zerrenda">
    <h1>Zure joko zerrenda</h1><br>
    <?php
        echo "<p>";
        nireJokoakInprimatu($conn, $_SESSION["izenAbizen"]);
        echo "</p>";
    ?>
    </section>
<?php
    include_once 'footer.php';
?>