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
            <h1>AUKERAN DAUDEN JOKOAK</h1>
        </section>

    <section class="index-categories">
        <div class = "index-categories-list">
            <!--Hemen beherago eskuragarri dauden jokoetatik bat hautatzeko aukera ematen diogu erabiltzaileari.
            Joku bat hemen hautatzerakoan, erabiltzailearen joku-zerrenda pertsonalean sartuko dugu -->
            <?php
    	if($_POST){
    		$izenAbizen = isset($_POST['izenAbizen']) ? $_POST['izenAbizen'] : '';
    		$pasahitza = isset($_POST['pasahitza']) ? $_POST['pasahitza'] : '';
    		$csrf = isset($_POST['csrf']) ? $_POST['csrf'] : '';
    		if(!empty($izenAbizen) && !empty($pasahitza) && !empty($csrf)){
    			if($_SESSION['csrf'] === $csrf){
    				echo "vas bien csrf";
    				unset($_SESSION['csrf']);
    			}else{
    				echo "ha fallado el csrf";
    			}
    		}
    	}
    	$token = md5(uniqid(rand(), true));
    	$_SESSION['csrf'] = $token;	
    	?>
        <form action="Includes/index.inc.php" method="post">
            Sartu gustoko duzun jokoaren izena zure zerrendara gehitzeko:<input type="text" name="jokoIzena" placeholder="...">
            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
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
        if(isset($_GET["error"])){
            $_SESSION["errorea"]= $_GET["error"];
        }
    ?>

    

<?php  
    include_once 'footer.php';
?>
