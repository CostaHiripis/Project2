<a href='index.php?page=logout'>Log out</a>
<a href='index.php?page3=AdminMainScreen.php'>Main Page</a>
<?php
	$TableName = 'Ticket';
	$dbName = 'helpdesk';
	$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
	$query = "SELECT TicketID, Title, Opening_Date FROM " . $TableName."
	WHERE Status = 'Sent' GROUP BY Opening_Date";
	if($stmt = mysqli_prepare($conn, $query)){
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $id, $title, $date);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>There are no new tickets!</p>';
			} else {
				echo "<table width='100%' border='1'>";
				echo "<tr>   
					<th>Title</th>
					<th>Opening_Date</th>
					<th>Ticket</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)){
					echo "<td>".$title."</td>";
					echo "<td>".$date."</td>";
					echo "<td><a href='index.php?page33=AdminMessage.php-".$id."'>Details</a></td>";
				}
				echo '</table>';
			}
		} else {
			echo 'Error3';
		}
	} else {
		echo 'Error2';
	}
?>