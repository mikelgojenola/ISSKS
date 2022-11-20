<?php
 header("X-Content-Type-Options: 'nosniff'");
 header_remove("X-Powered-By");
 header_remove("Server");
 header("X-Frame-Options: 'DENY'");
 session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Bideojoko web sistema</title>
    </head>
    <body> 
        <?php
            require_once 'Includes/dbh.inc.php';
            require_once 'Includes/functions.inc.php';
            if(time()-$_SESSION["denb"] >= 900){
                session_start();
                session_unset();
                session_destroy();
            }
            $_SESSION["denb"] = time();
        ?>
    <script src="resources/script.js" type="text/javascript"></script>
        <section class="cabezera">
            <nav>
                <div class wrapper>
                    <!--Hemen orri guztietan egongo den goikaldeko menua jarri dugu, honekin nabigatzeko erreztasuna bermatu dugu -->
                        <ul>
                            <a href = "index.php" class="menu-item">Hasiera  |</a>
                            <a href = "jokoak.php" class="menu-item">Jokoak kudeatu  |</a>
                            <!--Hemengo honekin, erabiltzailea logeatuta badago, opzio batzuk bistaratuko ditugu, eta ezezkoan, beste batzuk -->
                            <?php
                            if(isset($_SESSION["izenAbizen"])) {
                            echo "<a href='nirejokoak.php'>Nire jokoak |";
                            echo "<a href='profila.php'>Profila |</a>";
                            echo "<a href='Includes/logout.inc.php'>Log out</a>";
                            }
                            else {
                                echo "<a href='signup.php'>Sign up  |</a>";
                                echo "<a href='login.php'>Log in</a>";
                            }
                            ?>
                        </ul>
                </div>
            </nav>
        </section>
        <div class="body">
