<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css">
    </head>
    <body>
        <?php
            if(isset($_GET['page'])){
                include($_GET['page']. ".php");
            } else{
                if(isset($_SESSION['loggedIn'])){
                    if(isset($_GET['page2'])){
                        include($_GET['page2'].".php");
                        echo "<a href='index.php?page=logout'>Log out</a>";
                    } else {
                        include($_GET['page2'].".php");
                        echo "<a href='index.php?page=logout'>Log out</a>";
                    }
                } else {
                    include('login.php');
                }
            }
        ?>
    </body>
</html>