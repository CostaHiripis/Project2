<p><a href='index.php?page=logout'>Log out</a>
<a href='index.php?page2=EmployeeCreateTicket.php'>Create new Ticket</a>
<a href='index.php?page2=EmployeeMainPage.php'>Main Page</a></p>
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
						<th>Opening_Date</th>
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
