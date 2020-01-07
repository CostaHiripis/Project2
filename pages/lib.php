<?php
	$conn = mysqli_connect("127.0.0.1", "root","")
	OR DIE("Error!");
	$DBName = 'HelpDesk';
	if (!mysqli_select_db($conn, $DBName)) {
	  $query = "CREATE DATABASE " . $DBName;
	  if($stmt=mysqli_prepare($conn, $query)) {
		if(mysqli_stmt_execute($stmt)){	
		  echo "Database created";
		} else {
		  echo "Error creating database";
		  die();
		}
	  }else {
		echo "Error creating database";
		die();
	  }
	} 
	if(mysqli_select_db($conn, $DBName)){
	  $TableName1 = "Employee";
	  $TableName2 = "Ticket";
	  $TableName3 = "Message";
	  $TableName4 = "Admin";
	  $query1 = "SHOW TABLES LIKE '". $TableName1 ."' ";
	  if($stmt = mysqli_prepare($conn, $query1)){
		if(mysqli_stmt_execute($stmt)){
		  mysqli_stmt_store_result($stmt);
		  if(mysqli_stmt_num_rows($stmt) == 0){
			mysqli_stmt_close($stmt);
			$query1 = "CREATE TABLE " . $TableName1 . " (
			  UserID INT NOT NULL AUTO_INCREMENT,
			  Employee_Name VARCHAR(50) NOT NULL,
			  Email VARCHAR(15) NOT NULL UNIQUE,
			  Company_Name VARCHAR(20),
			  Password VARCHAR(64) NOT NULL,
			  PRIMARY KEY(UserID)
			)";
			if($stmt = mysqli_prepare($conn, $query1)){
			  if(mysqli_stmt_execute($stmt)){
				echo "Table1 created";
			  } else {
				echo "Table1 has not been created";
				die();
			  }
			}else{
			  echo "Table1 has not been created";
			  die();
			}
		  } 
		} else {
		  echo 'Error1!';
		}
	  } else {
		echo 'Error1!';
	  }
	  $query4 = "SHOW TABLES LIKE '". $TableName4 ."' ";
	  if($stmt = mysqli_prepare($conn, $query4)){
		if(mysqli_stmt_execute($stmt)){
		  mysqli_stmt_store_result($stmt);
		  if(mysqli_stmt_num_rows($stmt) == 0){
			mysqli_stmt_close($stmt);
			$query4 = "CREATE TABLE " . $TableName4 . " (
				AdminID INT NOT NULL AUTO_INCREMENT,
				Email VARCHAR(15) NOT NULL UNIQUE,
				Admin_Name VARCHAR(50) NOT NULL,
				Password VARCHAR(64) NOT NULL,
				Permission_Level INT NOT NULL,
				PRIMARY KEY(AdminID)
			)";
			if($stmt = mysqli_prepare($conn, $query4)){
			  if(mysqli_stmt_execute($stmt)){
				echo "Table4 created";
			  } else {
				echo "Table4 has not been created";
				die();
			  }
			}else{
			  echo "Table4 has not been created";
			  die();
			}
		  } 
		} else {
		  echo 'Error4!';
		}
	  } else {
		echo 'Error4!';
	  }
	  $query2 = "SHOW TABLES LIKE '". $TableName2 ."' ";
	  if($stmt = mysqli_prepare($conn, $query2)){
		if(mysqli_stmt_execute($stmt)){
		  mysqli_stmt_store_result($stmt);
		  if(mysqli_stmt_num_rows($stmt) == 0){
			mysqli_stmt_close($stmt);
			$query2 = "CREATE TABLE " . $TableName2 . " (
				TicketID INT NOT NULL AUTO_INCREMENT,
				Title VARCHAR(50) NOT NULL,
				Opening_Date DATE NOT NULL,
				Closing_Date DATE,
				Status VARCHAR(20),
				UserID INT NOT NULL,
				AdminID INT,
				Type VARCHAR(20),
				PRIMARY KEY(TicketID),
				CONSTRAINT FK_Admin FOREIGN KEY(AdminID) REFERENCES Admin(AdminID)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
				CONSTRAINT FK_User FOREIGN KEY(UserID) REFERENCES Employee(UserID)
				ON UPDATE CASCADE
				ON DELETE CASCADE
			)";
			if($stmt = mysqli_prepare($conn, $query2)){
			  if(mysqli_stmt_execute($stmt)){
				echo "Table2 created";
			  } else {
				echo "Table2 has not been created";
				die();
			  }
			}else{
			  echo "Table2 has not been created";
			  die();
			}
		  } 
		} else {
		  echo 'Error2!';
		}
	  } else {
		echo 'Error2!';
	  }
	  $query3 = "SHOW TABLES LIKE '". $TableName3 ."' ";
	  if($stmt = mysqli_prepare($conn, $query3)){
		if(mysqli_stmt_execute($stmt)){
		  mysqli_stmt_store_result($stmt);
		  if(mysqli_stmt_num_rows($stmt) == 0){
			mysqli_stmt_close($stmt);
			$query3 = "CREATE TABLE " . $TableName3 . " (
				MessageID INT NOT NULL AUTO_INCREMENT,
				Content VARCHAR(2000) NOT NULL,
				TicketID INT NOT NULL,
				Date DATE,
				PRIMARY KEY(MessageID),
				CONSTRAINT FK_TicketID FOREIGN KEY(TicketID) REFERENCES Ticket(TicketID)
				ON UPDATE CASCADE
				ON DELETE NO ACTION
			)";
			if($stmt = mysqli_prepare($conn, $query3)){
			  if(mysqli_stmt_execute($stmt)){
				echo "Table3 created";
			  } else {
				echo "Table3 has not been created";
				die();
			  }
			}else{
			  echo "Table3 has not been created";
			  die();
			}
		  } 
		} else {
		  echo 'Error3!';
		}
	  } else {
		echo 'Error3!';
	  }
	  If(isset($_POST['register'])){
		If(empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr']) 
		OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['companyname'])){
		  echo "<p>Please fill in your details!</p>";
		} else {
		  If($_POST['pw'] == $_POST['pwr']){
			$TableName = "Employee";
			$name = $_POST['firstname'].' '.$_POST['lastname'];
			$password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
			$email = $_POST['email'];
			$company = $_POST['companyname'];
			$query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,?)";
			If($stmt = mysqli_prepare($conn, $query)){
			  mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $company, $password_hash);
			  If(mysqli_stmt_execute($stmt)){
				echo '<p>Thank you for registration!</p>';
			  } else {
				echo "Data has not been inserted";
				die();
			  }
			  mysqli_stmt_close($stmt);
			} else {
			  echo '<p>Error!</p>';
			}
		  } else {
			echo '<p>Passwords are not the same!</p>';
		  }

		}
	  }
	} else {
	  die(mysqli_error($conn));
	}
	mysqli_close($conn);

?>
