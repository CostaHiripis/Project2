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
  $TableName = "Registration";
  $query = "SHOW TABLES LIKE '". $TableName ."' ";
  if($stmt = mysqli_prepare($conn, $query)){
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 0){
        mysqli_stmt_close($stmt);
        $query = "CREATE TABLE " . $TableName . " (
          UserID INT NOT NULL AUTO_INCREMENT,
          FirstName VARCHAR(30) NOT NULL,
          LastName VARCHAR(30) NOT NULL,
          Email VARCHAR(15) NOT NULL,
          Password VARCHAR(64) NOT NULL,
          PRIMARY KEY(UserID)
        )";
        if($stmt = mysqli_prepare($conn, $query)){
          if(mysqli_stmt_execute($stmt)){
            echo "Table created";
          } else {
            echo "Table has not been created";
            die();
          }
        }else{
          echo "Table has not been created";
          die();
        }
      } 
    } else {
      echo 'Error!';
    }
  } else {
    echo 'Error!';
  }
  If(isset($_POST['register'])){
    If(empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr']) 
    OR empty($_POST['firstname']) OR empty($_POST['lastname'])){
      echo "<p>Please fill in your details!</p>";
    } else {
      If($_POST['pw'] == $_POST['pwr']){
        $TableName = "Registration";
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,?)";
        If($stmt = mysqli_prepare($conn, $query)){
          mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $email, $password_hash);
          If(mysqli_stmt_execute($stmt)){
            echo '<p>Thank you for registration!</p>';
          } else {
            echo "Data has not been inserted";
            die();
          }
        } else {
          echo '<p>Error!</p>';
        }
      } else {
        echo '<p>Passwords are not the same!</p>';
      }

    }
  }
  mysqli_stmt_close($stmt);
} else {
  die(mysqli_error($conn));
}
mysqli_close($conn);

?>
