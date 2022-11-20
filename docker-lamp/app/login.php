<?php
    include_once 'header.php';
?>

<section class="signup-form">
    <!--hemen, erabiltzaile bat bere kredentzialekin logeatu ahalko da, bere joku-zerrenda eta informazioa ikusteko.
    Erabiltzaileak sartutako izena eta pasahitza datu basean daudenekin konparatuko dira. -->
    <h2>Log in</h2>
    
    <div class="signup-form-form">
    	<?php
        $_SESSION["index"] = 0;
    	if($_POST){
            $_SESSION["index"] = $_SESSION["index"] + 1;
    		$izenAbizen = isset($_POST['izenAbizen']) ? $_POST['izenAbizen'] : '';
    		$pasahitza = isset($_POST['pasahitza']) ? $_POST['pasahitza'] : '';
    		$csrf = isset($_POST['csrf']) ? $_POST['csrf'] : '';
    		if(!empty($izenAbizen) && !empty($pasahitza) && !empty($csrf)){
    			if($_SESSION['csrf'] === $csrf){
    				unset($_SESSION['csrf']);
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
            <input type="hidden" name="index" value="<?php echo $index ?>">
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
    
    <?php
        if(isset($_GET["error"])){
            $_SESSION["errorea"]= $_GET["error"];
            if($_GET["error"] == "emptyinput"){
                echo "<p>Xena los coxos</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo "<p>Hazlo biem tus muertos</p>";
                $_SESSION["errorea"]= $_GET["error"];   
            }

        }
    ?>
</section>

<?php
    include_once 'footer.php';
?>
