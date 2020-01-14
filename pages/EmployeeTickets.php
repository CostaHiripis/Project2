<div id="fullPage">
  <div id="header">
    <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
    <div id="user">
			<div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
	    <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
    </div>
  </div>
<a href='index.php?page2=EmployeeCreateTicket.php'>Create new Ticket</a>
<h1>My tickets</h1>
<?php
	$TableName = 'Ticket';
	$idd = $_SESSION['id'];
	$dbName = 'helpdesk';
	$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
	$query = "SELECT TicketID, Title, Opening_Date, Status FROM " . $TableName."
	 WHERE UserID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 'i', $idd);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $id, $title, $date, $status);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>There are no data!</p>';
			} else {
				echo "<table width='100%' border='1'>";
				echo "<tr>
						<th>Title</th>
						<th>Opening Date</th>
						<th>Status</th>
						<th>Ticket</th>
					</tr>";
				while(mysqli_stmt_fetch($stmt)){
					echo "<tr><td>".$title."</td>";
					echo "<td>".$date."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a href='index.php?page22=EmployeeMessage.php-".$id."'>Ticket</a></td></tr>";
				}
				echo '</table>';
			}
		} else {
			echo 'Error2';
		}
	} else {
		echo 'Error2';
	}
?>
</div>
