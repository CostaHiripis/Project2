<a href='index.php?page=logout'>Log out</a>
<a href='index.php?page5=SecurityMainPage.php'>MainPage</a>
<?php
	$id=$_SESSION['update'];
	$dbName = 'helpdesk';
	$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
	$TableName = 'Admin';
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
	} elseif(isset($_POST['submitPhoto'])){
			if ((($_FILES["photo"]["type"] == "image/png") OR ($_FILES["photo"]["type"] == "image/jpeg") OR ($_FILES["photo"]["type"] == "image/jpg"))
			AND ($_FILES["photo"]["size"] < 600000)){
				if ($_FILES["photo"]["error"] > 0){
					echo "<p class='red'>Error!</p>";
				} else {
					$nameUP = $_SESSION['nameUP'];
					$nameUP2 = explode(' ', $nameUP);
					$fname = $nameUP2[0];
					$lname = $nameUP2[1];
					$filename = $_SESSION['pathUP'];
					unlink($filename);
					move_uploaded_file($_FILES["photo"]["tmp_name"], '../avatar/'.$fname.'-'.$lname.'/'.$_FILES["photo"]["name"]);
					$pathNew = '../avatar/'.$fname.'-'.$lname.'/'.$_FILES["photo"]["name"];
					$TableName = 'Admin';
					$query = "UPDATE ".$TableName." SET ImagePath= ? WHERE AdminID LIKE ?";
					if ($stmt = mysqli_prepare($conn, $query)) {
						mysqli_stmt_bind_param($stmt, 'si', $pathNew, $id);
						if(mysqli_stmt_execute($stmt)){
							echo "<p class='update'>Profile image is updated!</p>";
						} else {
							echo "<p class='red'>Error</p>";
						}
					} else {
						echo "<p class='red'>Error</p>";
					}
				}
			} else {
				echo 'Invalid file';
			}
	}

	$query = "SELECT Email, Admin_Name, Permission_Level, ImagePath FROM " . $TableName.
	 " WHERE AdminID LIKE ?";
	if($stmt = mysqli_prepare($conn, $query)){
		mysqli_stmt_bind_param($stmt, 's', $id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $email, $name, $level, $path);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0){
				echo '<p>Empty!</p>';
			} else {
				while(mysqli_stmt_fetch($stmt)){
					$_SESSION['nameUP']=$name;
					$_SESSION['pathUP']=$path;
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
					<h2>Update photo</h2>
					<form method="post" action='index.php?page6=SecurityUpdate.php-<?php echo $id ?>' enctype="multipart/form-data">
						<div id='bla'>
							<img id="blah" src="<?php echo $path; ?>"/>
						</div>
						<input id='choose' type='file' name="photo" onchange="readURL(this);">
						<p><input type="submit" name='submitPhoto' value="New Photo" /></p> 
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
	mysqli_close($conn);
?>