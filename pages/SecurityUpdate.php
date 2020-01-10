<a href='index.php?page=logout'>Log out</a>
<?php
	$id=$_SESSION['update'];
	$dbName = 'helpdesk';
	$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
	$TableName = 'Admin';
	$query = "SELECT Email, Admin_Name, Permission_Level FROM " . $TableName.
	 " WHERE AdminID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 's', $id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $email, $name, $level);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					?>
					<h2>Update data</h2>
					<form method="post" action='index.php?page6=SecurityUpdate.php-<?php echo $id ?>' >
						<p>Full name <input type="text" name="name" value="<?php echo $name; ?>"/>
						<p>Email <input type="email" name="email" value="<?php echo $email; ?>"/></p>
						<p>Level <input type="text" name="level" value="<?php echo $level; ?>"/></p>
						<p><input type="submit" name='submit' value="Update" /></p> 
					</form>	
					<h2>Update password</h2>
					<form method="post" action='index.php?page6=SecurityUpdate.php-<?php echo $id ?>' >
						<input type="password" name="pw" placeholder="Password">
						<input type="password" name="pwr" placeholder="Repeat Password">
						<p><input type="submit" name='submitPas' value="Update" /></p> 
					</form>	
					<?php
				}
			}
			mysqli_stmt_close($stmt);
		} else {
			echo 'Error3';
		}
	} else {
		echo 'Error2';
	}
	If(isset($_POST['submit'])){
		If(empty($_POST['name']) OR empty($_POST['email']) 
		OR empty($_POST['level'])){
			echo "<p>You must fill all empty space!</p>";
		} else {
			$TableName = 'Admin';
			$name = $_POST['name'];	
			$email = $_POST['email'];	
			$level = $_POST['level'];
			$query = "UPDATE ". $TableName . " SET Admin_Name=?, Email=?,
			 Permission_Level=? WHERE AdminID LIKE ?";
			if ($stmt = mysqli_prepare($conn, $query)) {
				mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $level, $id);
				if(mysqli_stmt_execute($stmt)){
					echo "Data updated successfully";
				} else {
					echo "Error8";
				}
			} else {
				echo "Error6";
			}
		}
	} elseif(isset($_POST['submitPas'])){
		if(empty($_POST['pw']) OR empty($_POST['pwr'])){
			echo "<p>Please fill in your details!</p>";
		} else {
			If($_POST['pw'] == $_POST['pwr']){
				$password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
				$TableName = 'Admin';
				$query = "UPDATE ". $TableName . " SET Password=? WHERE AdminID LIKE ?";
				if ($stmt = mysqli_prepare($conn, $query)) {
					mysqli_stmt_bind_param($stmt, 'si', $password_hash, $id);
					if(mysqli_stmt_execute($stmt)){
						echo "Password updated successfully";
					} else {
						echo "Error8";
					}
				} else {
					echo "Error6";
				}
			} else {
				echo '<p>Passwords are not the same!</p>';
			}
		}
	}
	mysqli_close($conn);
?>
<p><a href='index.php?page5=SecurityMainPage.php'>MainPage</a></p>