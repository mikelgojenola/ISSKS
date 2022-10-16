<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>PHP proba</title>
    </head>
    <body>
        <?php
            require_once 'Includes/dbh.inc.php';
            require_once 'Includes/functions.inc.php';
        ?>
    <script src="resources/script.js" type="text/javascript"></script>
        <section class="cabezera">
            <nav>
                <div class wrapper>
                        <ul>
                            <a href = "index.php" class="menu-item">Hasiera  |</a>
                            <a href = "jokoak.php" class="menu-item">Jokoak kudeatu  |</a>
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