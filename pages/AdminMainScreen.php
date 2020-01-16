    <div id="fullPage">
      <div id="header">
          <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
          <div id="admin">
              <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
              <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
              <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
          </div>
      </div>
      <div id="main">
		  <div id="section1">
			  <div id="boxWide">
				<a href="index.php?page3=AdminSolveTickets.php">
				  <div class="effect ticketBg" id="effectlblue">
					<div class="textDiv">
					  <h1 class="boxText">Tickets</h1>
					</div>
				  </div>
				</a>
			  </div>
			</div>
			<div id="section2">
			  <div class="boxNormal boxLeft">
				<a href="index.php?page=logout">
				  <div class="effect logout" id="effectblue">
					<div class="textDiv">
					  <h1 class="boxText">Log out</h1>
					</div>
				  </div>
				</a>
			  </div>
			  <div class="boxNormal boxRight">
				<a href="index.php?page3=AdminSummaryTickets.php">
				  <div class="effect ticketInfBg" id="effectblue">
					<div class="textDiv">
					  <h1 class="boxText">Tickets summary</h1>
					</div>
				  </div>
				</a>
			  </div>
			</div>
        </div>
      </div>
    </div>
