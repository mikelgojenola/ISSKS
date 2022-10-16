<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h2>Izena emanin</h2>
    <form action="Includes/signup.inc.php" method="post">
        Izena: <input type="text" id="izena" name="izenAbizen" placeholder="Izena sartu...">
        NAN: <input type="text" id="nan" name="NAN" placeholder="NAN-a sartu..." onblur="konpNAN(this.value)">
        Telefonoa: <input type="text" id="tlf" name="telefonoa" placeholder="Telefonoa sartu..." onblur="konpTelefonoa(this.value)">
        Jaiotze-data: <input type="text" id="data" name="jaiotzeData" placeholder="Data...">
        email: <input type="text" id="email" name="email" placeholder="email..." onblur="konpEmail(this.value)">
        Pasahitza: <input type="password" id="psw" name="pasahitza" placeholder="Pasahitza sartu...">
        Pasahitza errepikatu: <input type="password" name="RPasahitza" placeholder="Pasahitza errepikatu...">
        <button type="submit" name="submit">Izena eman</button>
    </form>
    </div>
<?php

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