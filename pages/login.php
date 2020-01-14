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
						$TableName2 = 'employee';
						$query2 = "SELECT UserID, Email, Password, Employee_Name
						FROM " . $TableName2 . " WHERE Email = ?";
						$query = "SELECT AdminID, Email, Password, Permission_Level, ImagePath, Admin_Name
						FROM " . $TableName . " WHERE Email = ?";
						$password = $_POST['pw'];
						$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
						If($stmt = mysqli_prepare($conn, $query)){
								mysqli_stmt_bind_param($stmt, 's', $email);
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $id, $DBemail, $DBpassword, $level, $path, $name);
									mysqli_stmt_store_result($stmt);
									while(mysqli_stmt_fetch($stmt)){
										if($DBemail == $email AND password_verify($password, $DBpassword)){
											$_SESSION['loggedIn'] = true;
											$_SESSION['level'] = $level;
											$_SESSION['id'] = $id;
											$_SESSION['conn'] = 'bbfb';
											$_SESSION['name'] = $name;
											If($path == NULL){
												$_SESSION['path'] = '../img/defuserpic.png';
											} else {
												$_SESSION['path'] = $path;
											}
											echo ' <script>window.location.href="index.php";</script>';
										} else {
											echo '<p>Wrong email or password!</p>';
										}
									}

								} else {
									echo "<p>$conn</p>"
									. "<p>Error code " . mysqli_errno($conn) . ": "
									. mysqli_error($conn) . "</p>";
								}
						} else {
							echo "<p>Error!</p>"
							. "<p>Error code " . mysqli_errno($conn) . ": "
							. mysqli_error($conn) . "</p>";
						}
						if($stmt = mysqli_prepare($conn, $query2)){
							mysqli_stmt_bind_param($stmt, 's', $email);
							if(mysqli_stmt_execute($stmt)){
								mysqli_stmt_bind_result($stmt, $id, $emaill, $passwordd, $name);
								mysqli_stmt_store_result($stmt);
								while(mysqli_stmt_fetch($stmt)){
									if($emaill == $email AND password_verify($password, $passwordd)){
										$_SESSION['loggedIn'] = true;
										$_SESSION['level'] = 0;
										$_SESSION['id'] = $id;
										$_SESSION['name'] = $name;
										echo ' <script>window.location.href="index.php";</script>';
									} else {
										echo '<p>Wrong email or password!</p>';
									}
								}
							} else {
								echo "<p>Error!</p>"
								. "<p>Error code " . mysqli_errno($conn) . ": "
								. mysqli_error($conn) . "</p>";
							}
						}
						mysqli_stmt_close($stmt);
						mysqli_close($conn);
					}
				}
						//$dbName = 'operationhelp';
						//$conn = mysqli_connect("127.0.0.1", "operationhelp", "!PwO_1711", $dbName) OR DIE ('Error: '. mysqli_error($conn));

              ?>
              </div>
            <div class="btndiv">
                <form action="index.php?page=register" method="post">
                    <input class="inputbtn" type="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>
