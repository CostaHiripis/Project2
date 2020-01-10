<?php
	If(isset($_POST['submit'])){
		If(empty($_POST['content']) OR empty($_POST['title'])){
		  echo "<p>Please fill in your details!</p>";
		} else {
			$TableName = 'Ticket';
			$DBName = 'helpdesk';
			$conn = mysqli_connect("127.0.0.1", "root","",$DBName)OR DIE("Error1!");
			$content = $_POST['content'];
			If($content !== $_SESSION['conn']){
				$title = $_POST['title'];
				$date = date("Y-m-d");
				$Uid = $_SESSION['id'];
				$status = 'Sent';
				$query = "INSERT INTO ". $TableName ." VALUES(NULL,?,?,?,NULL,?,?,NULL,NULL)";
				If($stmt = mysqli_prepare($conn, $query)){
				  mysqli_stmt_bind_param($stmt, 'ssssi', $title, $content, $date, $status, $Uid);
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
		}
		mysqli_close($conn);
	}
	

?>

    <div id="fullPage">
      <div id="header">
        <img id="logoPic" src="../img/nhl.png" alt="nhl">
        <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
      </div>
      <div id="main">
        <div class="outer">
          <div class="middle">
            <div style="height:400px" class="inner">
              <form action="#" method="post">
                  <h2 id="maintitle">Please fill out all the fields!</h2>
                  <input id="title" type="text" name="title" placeholder="Title">
                  <textarea name="content" placeholder="Description" rows="8" cols="50"></textarea>
                  <div id="errorDiv">
                  </div>
                <div class="ticketbtn">
                  <input class="inputbtn" type="submit" name="submit" value="Submit">
                </div>
				<a href='index.php?page=logout'>Log out</a>
<a href='index.php?page2=EmployeeTickets.php'>My Tickets</a>
<a href='index.php?page2=EmployeeMainPage.php'>Main Page</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
