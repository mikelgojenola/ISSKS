<?php
    include_once 'header.php';
?>

    <section class="body">
        <?php
            if (isset($_SESSION["izenAbizen"])){
                echo "<p>Hello there " .$_SESSION["izenAbizen"]. "<br></p>";
            }
            /*else{
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Log in</a></li>";
            }*/
        ?>
    </section>
    <section class="index-intro">
            <h1>AUKERAN DAUDEN JOKUAK</h1>
        </section>

    <section class="index-categories">
        <div class = "index-categories-list">
        <form action="Includes/index.inc.php" method="post">
            Sartu gustoko duzun jokoaren izena zure zerrendara gehitzeko:<input type="text" name="jokoIzena" placeholder="...">
            <button type="submit" name="gehitu">Listara gehitu</button>
            <br><br><br>
            <h1>Jokoak:</h1><br>
            <?php
                echo "<p>";
                jokoIzenakInprimatu($conn);
                echo "</p>";
            ?>
        </form>
            <!--<div>
                <h3>Kimgon Cum indiference</h3><input type="radio" name="jokuak" id="kcd"></input>
            </div>   
            <div>
                <h3>Minceraft</h3><input type="radio" name="jokuak" id="mc"></input>
            </div>
            <div>
                <h3>Viste a Jägger</h3><input type="radio" name="jokuak" id="vj"></input>
            </div>
                
                <input type="button" onclick="jokoaIkusi()" value="begiratu"></input>
            </div> -->  
        </div>
    </section>
    

<?php  
    include_once 'footer.php';
?>