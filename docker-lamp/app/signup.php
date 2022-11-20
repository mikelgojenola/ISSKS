<?php
include_once 'header.php';
?>

<section class="signup-form">
    <!--Honekin edozein erabiltzailek bere datuak datu basean sartu izango ahal ditu, izena emanez,
    geroago logeatu ahal izateko -->
    <h2>Izena eman</h2>
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
    
    <form action="Includes/signup.inc.php" method="POST">
        Izena: <input type="text" id="izena" name="izenAbizen" placeholder="Izena sartu...">
        NAN(11111111-A): <input type="text" id="nan" name="NAN" placeholder="NAN-a sartu..." onblur="konpNAN(this.value)">
        Telefonoa(999999999): <input type="text" id="tlf" name="telefonoa" placeholder="Telefonoa sartu..." onblur="konpTelefonoa(this.value)">
        Jaiotze-data(aaaa-mm-dd): <input type="text" id="data" name="jaiotzeData" placeholder="Data...">
        email(izena@mail.ext): <input type="text" id="email" name="email" placeholder="email..." onblur="konpEmail(this.value)">
        Pasahitza: <input type="password" id="psw" name="pasahitza" placeholder="Pasahitza sartu..." onblur="konpPsw(this.value)">
        Pasahitza errepikatu: <input type="password" name="RPasahitza" placeholder="Pasahitza errepikatu...">
        <input type="hidden" name="csrf" value="<?php echo $token; ?>">
        <button type="submit" name="submit">Izena eman</button>
    </form>
    </div>
<?php
    //Hemen parametroak ondo sartzen direla konprobatzen da, zera da, formatu baliogarriak direla.
    if(isset($_GET["error"])){

        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
        else if($_GET["error"] == "invaliduid"){
            echo "<p>izena egokia jarri/p>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Email egokia jarri</p>";
        }
        else if($_GET["error"] == "invalidNAN"){
            echo "<p>NAN egokia jarri</p>";
        }
        else if($_GET["error"] == "passwordsdontmatch"){
            echo "<p>Pasahitzak ez dira egokiak</p>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>Ez dabil</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Izena edo emaila hartuta daude</p>";
        }
        else if($_GET["error"] == "none"){
             echo "<p>tas dentro manin</p>";
        }
    }
?>

</section>

<?php
    include_once 'footer.php';
?>
