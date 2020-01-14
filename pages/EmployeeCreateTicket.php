<?php
	If(isset($_POST['submit'])){
		If(empty($_POST['content']) OR empty($_POST['title']) OR empty($_POST['type'])){
		  echo "<p>Please fill in your details!</p>";
		} else {
			$TableName = 'ticket';
			$dbName = 'helpdesk';
			$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
			$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
			if (!filter_var($content, FILTER_SANITIZE_STRING) === false) {
				$_SESSION['conn'] = 'bbfb';
				If($content !== $_SESSION['conn']){
					$title = $_POST['title'];
					$type = $_POST['type'];
					$date = date("Y-m-d");
					$Uid = $_SESSION['id'];
					$status = 'Sent';
					$query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,NULL,?,?,NULL,?)";
					If($stmt = mysqli_prepare($conn, $query)){
					  mysqli_stmt_bind_param($stmt, 'ssssis', $title, $content, $date, $status, $Uid, $type);
					  If(mysqli_stmt_execute($stmt)){
						echo '<p>Thank you for ticket!</p>';
						$_SESSION['conn'] = $content;
					  } else {
						echo "Data has not been inserted";
					  }
					  mysqli_stmt_close($stmt);
					} else {
					  echo '<p>Error2!</p>';
					}
					
				}
			} else {
				echo '<p>Invalid message!</p>';
			}
			mysqli_close($conn);
		}
	}
	

?>

    <div id="fullPage">
      <div id="main">
        <div class="outer">
          <div class="middle">
            <div style="height:400px" class="inner">
              <form action="#" method="post">
                  <div><a href="index.php"><img id="backbtn" src="../img/back.png" alt="back"></a></div>
                  <h2 id="maintitle">Please fill out all the fields!</h2>
                  <input id="title" type="text" name="title" placeholder="Title">
								  <select id="category" name='type'>
									<option value="" disabled selected>Category...</option>
									<option value='Hardware'>Hardware</option>
									<option value='Software'>Software</option>
									<option value='Wish'>Wish</option>
								  </select>
                  <textarea name="content" placeholder="Description" rows="8" cols="50"></textarea>
                  <div id="errorDiv">
										<?php
											if(isset($_POST['submit'])){
												if(empty($_POST['content']) OR empty($_POST['title']) OR empty($_POST['type'])){
												  echo "<p>Please fill in your details!</p>";
												} else {
													$TableName = 'ticket';
													$dbName = 'helpdesk';
													$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
													$content = $_POST['content'];
													$_SESSION['conn'] = 'bbfb';
													if($content !== $_SESSION['conn']){
														$title = $_POST['title'];
														$type = $_POST['type'];
														$date = date("Y-m-d");
														$Uid = $_SESSION['id'];
														$status = 'Sent';
														$query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,NULL,?,?,NULL,?)";
														if($stmt = mysqli_prepare($conn, $query)){
														  mysqli_stmt_bind_param($stmt, 'ssssis', $title, $content, $date, $status, $Uid, $type);
														  if(mysqli_stmt_execute($stmt)){
															echo '<p>Thank you for ticket!</p>';
															$_SESSION['conn'] = $content;
														  } else {
															echo "Data has not been inserted";
														  }
														  mysqli_stmt_close($stmt);
														} else {
														  echo '<p>Error2!</p>';
														}
													}
															mysqli_close($conn);
												}
											}
										?>
                  </div>
                <div class="ticketbtn">
                  <input class="inputbtn" type="submit" name="submit" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
