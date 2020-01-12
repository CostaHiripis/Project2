
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stenden HelpDesk</title>
    <link rel="stylesheet" href="../CSS/boxstyle.css">
  </head>
  <body>
    <div id="fullPage">
                <div id="header">
    				<a href='index.php?page4=ModMainPage.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
    				<div id="user">
    					<img id='userPic' src=<?php echo $_SESSION['path'];  ?> alt="userPic">
    					<p id='userName'><?php echo $_SESSION['name']; ?></p>
    					<div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
    				</div>
    			</div>
    			<div id="section1">
    			  <div id="boxWide">
    				<a href="index.php?page4=ModSolveTickets.php">
    				  <div class="effect ticketBg" id="effectlblue">
    					<div class="textDiv">
    					  <h1 class="boxText">Tickets</h1>
    					</div>
    				  </div>
    				</a>
    			  </div>
    			</div>
    </div>
  </body>
</html>
