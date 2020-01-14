    <div id="fullPage">
          <div id="header">
            <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
            <div id="user">
        			<div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
        	    <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
            </div>
          </div>
			<?php
				$TableName = 'Ticket';
							$dbName = 'helpdesk';
							$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
							$query = "SELECT COUNT(*) FROM ".$TableName." WHERE Status = 'Closed'";
							if($stmt = mysqli_prepare($conn, $query)){
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $summary);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo 'Summary solved tickets: 0';
									} else {
										while(mysqli_stmt_fetch($stmt)){
			?>
			<div class="BgTickets" id="effectblue">
				<div class="TicketsHeader" id="effectteal">
					<h3 id='col1'>Open Tickets</h3>
					<h3 id='col2'>Summary solved tickets: <?php echo $summary; ?></h3>
				</div>
			<?php
										}
									}
								} else {
									echo 'Error4';
								}
							} else {
								echo 'Error5';
							}
							$query = "SELECT TicketID, Title, Opening_Date, Status, Admin.Admin_Name, Admin.ImagePath FROM " . $TableName."
							 JOIN Admin ON Ticket.AdminID = Admin.AdminID";
							if($stmt = mysqli_prepare($conn, $query)){
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $id, $title, $date, $status, $name, $path);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo '<p>There are no data!</p>';
									} else {
										while(mysqli_stmt_fetch($stmt)){
						?>
						<div class="Ticket" id="effectlblue">
							<div class="TicketLeft">
								<div class="Name"><?php echo $title; ?></div>
								<?php If($status == 'Sent'){ ?>
								<div class="Status1"></div>
								<?php }elseif($status == 'In process'){?>
								<div class="Status2"></div>
								<?php }else{ ?>
								<div class="Status3"></div>
								<?php } ?>
							</div>
							<div class="TicketRight">
								<div class="Helper"><div class="Text"><?php echo $name; ?></div>
									<div class='pp'>
										<img class="HelperPic" src="<?php If($path == NULL){
												echo '../img/defuserpic.png';
											} else {
												echo $path;
											}
										?>" alt="userPic"><div class='pp2'></div>
									</div>
									<div id="effectblue" class="Drop"><div class="Delete">X</div></div>
								</div>
							</div>
						</div>
					<?php
										}
									}
								} else {
									echo 'Error3';
								}
							} else {
								echo 'Error2';
							}
					?>
            </div>
        </div>
