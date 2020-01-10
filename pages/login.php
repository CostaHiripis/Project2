	<div class="outer">
      <div class="middle">
        <div style="height:400px" class="inner">
          <form action='index.php?page=login' method="post">
              <img id="loginnhl" src="../img/nhl.png" alt="nhl">
              <input class='inp' type="email" name="email" placeholder="Email">
              <input class='inp' type="password" name="pw" placeholder="Password">
              <div id="errorDiv">
              <?php
				if(isset($_POST['login'])){
					if(!empty($_POST['email']) AND !empty($_POST['pw'])){
						$dbName = 'helpdesk';
						$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
						$TableName = 'admin';
						$TableName2 = 'Employee';
						$query2 = "SELECT UserID, Email, Password 
						FROM " . $TableName2 . " WHERE Email LIKE ?";
						$query = "SELECT AdminID, Email, Password, Permission_Level 
						FROM " . $TableName . " WHERE Email LIKE ?";
						$password = $_POST['pw'];
						$email = $_POST['email'];
						If($stmt = mysqli_prepare($conn, $query)){
								mysqli_stmt_bind_param($stmt, 's', $email);
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $id, $DBemail, $DBpassword, $level);
									mysqli_stmt_store_result($stmt);
									while(mysqli_stmt_fetch($stmt)){
										if($DBemail == $email AND password_verify($password, $DBpassword)){
											$_SESSION['loggedIn'] = true;
											$_SESSION['level'] = $level;
											$_SESSION['id'] = $id;
											$_SESSION['conn'] = 'bbfb';
											echo '<a href="index.php">Go to main page</a>';
										} else {
											echo '<p>Wrong email or password!</p>';
										}
									} 
									
								} else {
									echo 'Error!';
								}
						} else {
							echo 'Error!';
						}
						if($stmt = mysqli_prepare($conn, $query2)){
							mysqli_stmt_bind_param($stmt, 's', $email);
							if(mysqli_stmt_execute($stmt)){
								mysqli_stmt_bind_result($stmt, $id, $DBemail, $DBpassword);
								mysqli_stmt_store_result($stmt);
								while(mysqli_stmt_fetch($stmt)){
									if($DBemail == $email AND password_verify($password, $DBpassword)){
										$_SESSION['loggedIn'] = true;
										$_SESSION['level'] = 0;
										$_SESSION['id'] = $id;
										echo '<a href="index.php">Go to main page</a>';
									} else {
										echo '<p>Wrong email or password!</p>';
									}
								} 
							} else {
								echo 'Error!';
							}
						}							
					}
				}
					
                	
						
						
						
						
						
						//$dbName = 'operationhelp';
						//$conn = mysqli_connect("127.0.0.1", "operationhelp", "!PwO_1711", $dbName) OR DIE ('Error: '. mysqli_error($conn));
						
              ?>
              </div>
            <div class="btndiv">
              <input class="inputbtn" type="submit" name="login" value="Login">
            </div>
          </form>
          <div class="btndiv">
            <form action="index.php?page=register" method="post">
              <input class="inputbtn" type="submit" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>