<div id="fullPage">
      <div id="header">
        <a href='index.php?page2=EmployeeMainPage.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
		<h1 id='white'>Operation Desk</h1>
        <div id="user">
			<p id='userName'><?php echo $_SESSION['name']; ?></p>
			<p id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></p>
		</div>
      </div>
</div>
</p><a href='index.php?page2=EmployeeCreateTicket.php'>Create new Ticket</a></p>
</p><a href='index.php?page2=EmployeeTickets.php'>My Tickets</a></p>