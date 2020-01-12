
<div id="fullPage">
            <div id="header">
				<a href='index.php?page4=ModMainPage.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
				<h1 id='white'>Operation Desk</h1>
				<div id="user">
					<img id='userPic' src="<?php echo $_SESSION['path'];  ?>" alt="userPic">
					<p id='userName'><?php echo $_SESSION['name']; ?></p>
					<p id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></p>
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
