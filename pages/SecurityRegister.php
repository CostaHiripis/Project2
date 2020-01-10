<a href='index.php?page=logout'>Log out</a>
<form method="post">
    <input type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z']*">
    <input type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z']*">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="level" placeholder="Level of Rights">
    <input type="password" name="pw" placeholder="Password">
    <input type="password" name="pwr" placeholder="Repeat Password">
        <?php
            if(isset($_POST['register'])){
                $conn = mysqli_connect("127.0.0.1", "root","")OR DIE("Error!");
				$DBName = 'helpdesk';
				if(mysqli_select_db($conn, $DBName)){
					If(empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr']) 
					OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['level'])){
					  echo "<p>Please fill all empty space!</p>";
					} else {
						If($_POST['pw'] == $_POST['pwr']){
							$TableName = "Admin";
							$name = $_POST['firstname'].' '.$_POST['lastname'];
							$password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
							$email = $_POST['email'];
							$level = $_POST['level'];
							$query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,?)";
							If($stmt = mysqli_prepare($conn, $query)){
								mysqli_stmt_bind_param($stmt, 'ssss', $email, $name, $password_hash, $level);
								If(mysqli_stmt_execute($stmt)){
									echo '<p>New admin was created!</p>';
								} else {
									echo "Data has not been inserted";
								}
								mysqli_stmt_close($stmt);
							} else {
								echo '<p>Error!</p>';
							}
						} else {
							echo '<p>Passwords are not the same!</p>';
						}
					}
				} else {
				  die(mysqli_error($conn));
				}
				mysqli_close($conn);
            }
			
        ?>
    <input class="inputbtn" type="submit" name="register" value="Register">
	<p><a href='index.php?page5=SecurityMainPage.php'>MainPage</a></p>
</form>
