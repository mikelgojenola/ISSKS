<?php
    include_once 'header.php';
?>

<section class="signup-form">
    <h2>Log in</h2>
    <div class="signup-form-form">
        <form action ="Includes/login.inc.php" method="post">
            <input type="text" name="izenAbizen" placeholder="Izena...">
            <input type="password" name="pasahitza" placeholder="Pasahitza">
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