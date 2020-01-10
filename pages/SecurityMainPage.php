<div id="fullPage">
	<div id="header">
        <img id="logoPic" src="../img/nhl.png" alt="nhl">
		<a href='index.php?page=logout'>Log out</a>
		<p><?php 
			$dbName = 'helpdesk';
			$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
			if($_SESSION['level']>0){
				$query = 'SELECT Admin_Name FROM Admin WHERE AdminID LIKE ?';
				if ($stmt = mysqli_prepare($conn, $query)) {
					$idd = $_SESSION['id'];
					mysqli_stmt_bind_param($stmt, 'i', $idd);
					if(!mysqli_stmt_execute($stmt)){
						echo 'Error100';
					} else {
						mysqli_stmt_bind_result($stmt, $name);
						mysqli_stmt_store_result($stmt);
						while(mysqli_stmt_fetch($stmt)){
							echo '<p>'.$name.'</p>';
						}
					}
				} 
			} else {
				$query = 'SELECT';
			}
		?></p>
    </div>
	<?php
		if (isset($_GET['AdminID'])){
			$idd = $_GET['AdminID'];
			$TableName = 'Admin';
			$query = "DELETE FROM ".$TableName." WHERE AdminID LIKE ?";
			if ($stmt = mysqli_prepare($conn, $query)) {
				mysqli_stmt_bind_param($stmt, 'i', $idd);
				if(!mysqli_stmt_execute($stmt)){
					echo 'Error100';
				}
			} else {
				echo 'Error';
			}
			
		} elseif(isset($_GET['UserID'])){
			$idd = $_GET['UserID'];
			$TableName = 'Employee';
			$query = "DELETE FROM ".$TableName." WHERE UserID LIKE ?";
			if ($stmt = mysqli_prepare($conn, $query)) {
				mysqli_stmt_bind_param($stmt, 'i', $idd);
				if(!mysqli_stmt_execute($stmt)){
					echo 'Error100';
				}
			} else {
				echo 'Error';
			}
		}
	?>
	<h1>Admins: </h1>
	<?php 
		$TableName = 'Admin';
		$query = "SELECT AdminID, Email, Admin_Name, Password, Permission_Level FROM " . $TableName;
		if($stmt = mysqli_prepare($conn, $query)){
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_bind_result($stmt, $id, $email, $name, $password, $level);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 0){
					echo '<p>There are no data!</p>';
				} else {
					echo "<table width='100%' border='1'>";
					echo "<tr><th>ID</th>    
					<th>Email</th>
					<th>Full Name</th>
					<th>Password</th>
					<th>Level</th>
					<th>Update</th>
					<th>Delete</th></tr>";
					while(mysqli_stmt_fetch($stmt)){
						echo "<td>".$id."</td>";
						echo "<td>".$email."</td>";
						echo "<td>".$name."</td>";
						echo "<td>".$password."</td>";
						echo "<td>".$level."</td>";
						echo "<td><a href='index.php?page6=SecurityUpdate.php-".$id."'>Update</a></td>";
						echo "<td><a href='index.php?AdminID=".$id."'>Delete</a></td></tr>";
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
	<p><a href='index.php?page5=SecurityRegister.php'>Create new Admin<a></p>
	<h1>Users: </h1>
	<?php 
		$dbName = 'helpdesk';
		$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
		$TableName = 'Employee';
		$query = "SELECT UserID, Email, Employee_Name, Company_Name FROM " . $TableName;
		if($stmt = mysqli_prepare($conn, $query)){
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_bind_result($stmt, $id, $email, $name, $company);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 0){
					echo '<p>There are no data!</p>';
				} else {
					echo "<table width='100%' border='1'>";
					echo "<tr><th>ID</th>    
					<th>Email</th>
					<th>Full Name</th>
					<th>Company</th>
					<th>Delete</th></tr>";
					while(mysqli_stmt_fetch($stmt)){
						echo "<tr><td>".$id."</td>";
						echo "<td>".$email."</td>";
						echo "<td>".$name."</td>";
						echo "<td>".$company."</td>";
						echo "<td><a href='index.php?UserID=".$id."'>Delete</a></td></tr>";
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