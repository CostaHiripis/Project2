<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div style="height:400px" class="inner">
          <form action="#" method="post">
              <img id="loginnhl" src="../img/nhl.png" alt="nhl">
              <input type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <div id="errorDiv">
              <?php
                if(isset($_POST['login'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw'])){
                    $dbName = 'HelpDesk';
			            	$conn = mysqli_connect('127.0.0.1','operationhelp','!PwO_1711',$dbName) OR DIE ('Error: '. mysqli_error($conn));
                    $TableName = 'Registration';
                    $password = $_POST['pw'];
                    $email = $_POST['email'];
                    $query = "SELECT UserID, FirstName, LastName, Email, Password
                    FROM " . $TableName . " WHERE Email LIKE ?";
                    If($stmt = mysqli_prepare($conn, $query)){
                      mysqli_stmt_bind_param($stmt, 's', $email);
                      if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_bind_result($stmt, $id, $fname, $lname, $DBemail, $DBpassword);
                        mysqli_stmt_store_result($stmt);
                        while(mysqli_stmt_fetch($stmt)){
                          if($DBemail == $email AND password_verify($password, $DBpassword)){
                            echo '<p>You are logged in!</p>';
                          } else {
                            echo '<p>Wrong username or password!</p>';
                          }
                        }
                      } else {
                        echo 'Error!';
                      }
                    } else {
                      echo 'Error!';
                    }
                  }else{
                    echo "<p>Please fill in your details!</p>";
                  }
                }
              ?>
              </div>
            <div class="btndiv">
              <input class="inputbtn" type="submit" name="login" value="Login">
            </div>
          </form>
          <div class="btndiv">
            <form action="register.php" method="post">
              <input class="inputbtn" type="submit" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
