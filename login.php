<?php
    include_once 'header.php';
?>

<section class="signup-form">
    <!--hemen, erabiltzaile bat bere kredentzialekin logeatu ahalko da, bere joku-zerrenda eta informazioa ikusteko.
    Erabiltzaileak sartutako izena eta pasahitza datu basean daudenekin konparatuko dira. -->
    <h2>Log in</h2>
    
    <div class="signup-form-form">
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
    
        <form action ="Includes/login.inc.php" method="POST">
            <input type="text" name="izenAbizen" placeholder="Izena...">
            <input type="password" name="pasahitza" placeholder="Pasahitza">
            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
    
    <?php
        if(isset($_GET["error"])){

            if($_GET["error"] == "emptyinput"){
                echo "<p>Xena los coxos</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo "<p>Hazlo biem tus muertos</p>";
            }

        }
    ?>
</section>

<?php
    include_once 'footer.php';
?>
