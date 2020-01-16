<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Stenden HelpDesk</title>
        <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css">
		<link rel="stylesheet" type="text/css" href="../CSS/boxstyle.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Security.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Admin.css">
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
    <body>
        <?php
            if(isset($_GET['page'])){
                include($_GET['page']. ".php");
            } else{
                if(isset($_SESSION['loggedIn'])){
					if($_SESSION['level'] == 0){
						if(isset($_GET['page2'])){
							include($_GET['page2']);
						}elseif(isset($_GET['page22'])){
							$page = explode('-', $_GET['page22']);
							$_SESSION['ticket'] = $page[1];
							include($page[0]);
						} else {
							include("EmployeeMainPage.php");
						}
					} elseif($_SESSION['level'] == 1) {
						if(isset($_GET['page3'])){
							include($_GET['page3']);
						}elseif(isset($_GET['page33'])){
							$page = explode('-', $_GET['page33']);
							$_SESSION['ticket'] = $page[1];
							include($page[0]);
						} else {
							include("AdminMainScreen.php");
						}
					} elseif($_SESSION['level'] == 2) {
						if(isset($_GET['page4'])){
							include($_GET['page4']);
						}elseif(isset($_GET['page44'])){
							$page = explode('-', $_GET['page44']);
							$_SESSION['ticket'] = $page[1];
							include($page[0]);
						} else {
							include("ModMainPage.php");
						}
					} elseif($_SESSION['level'] == 3) {
						if(isset($_GET['page5'])){
							include($_GET['page5']);
						} elseif(isset($_GET['page6'])){
							$page = explode('-', $_GET['page6']);
							$_SESSION['update'] = $page[1];
							include($page[0]);
						}else {
							include("SecurityMainPage.php");
						}
					}
                } else {
                    include('login.php');
                }
            }
        ?>
    </body>
</html>
