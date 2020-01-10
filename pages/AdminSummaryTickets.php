
        <div id="fullPage">
            <div id="header">
                <img id="logoPic" src="../img/nhl.png" alt="nhl">
                <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
				<a href='index.php?page=logout'>Log out</a>
				<a href='index.php?page3=AdminMainScreen.php'>Main Page</a>
            </div>
            <div class="BgTickets" id="effectblue">
                <div class="TicketsHeader" id="effectteal">
                    <h3>Open Tickets</h3>
                </div>
                <div class="Ticket" id="effectlblue">
                    <div class="TicketLeft">
                        <div class="Name">Tickets&nbsp;</div>
                        <div class="Status"></div>
                    </div>
                    <div class="TicketRight">
                        <div class="Helper"><div class="Text">Helper Name</div>
                            <img id="HelperPic" src="../img/Jesus.jpg" alt="userPic"><div id="effectblue" class="Drop"><div class="Delete">X</div></div></div>
                        <?php
							$TableName = 'Ticket';
							$dbName = 'helpdesk';
							$conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error');
							$query = "SELECT COUNT(*) FROM ".$TableName." WHERE Status = 'Solved'";
							if($stmt = mysqli_prepare($conn, $query)){
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $summary);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo 'Summary solved tickets: 0';
									} else {
										while(mysqli_stmt_fetch($stmt)){
											echo 'Summary solved tickets: '.$summary;
										}
									}
								} else {
									echo 'Error4';
								}
							} else {
								echo 'Error5';
							}
							$query = "SELECT TicketID, Title, Opening_Date, Status, Admin.Admin_Name FROM " . $TableName."
							 JOIN Admin ON Ticket.AdminID = Admin.AdminID GROUP BY Opening_Date";
							if($stmt = mysqli_prepare($conn, $query)){
								if(mysqli_stmt_execute($stmt)){
									mysqli_stmt_bind_result($stmt, $id, $title, $date, $status, $name);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo '<p>There are no data!</p>';
									} else {
										echo "<table width='100%' border='1'>";
										echo "<tr>   
											<th>Title</th>
											<th>Opening_Date</th>
											<th>Status</th>
											<th>Name</th>
										</tr>";
										while(mysqli_stmt_fetch($stmt)){
											echo "<tr> <td>".$title."</td>";
											echo "<td>".$date."</td>";
											echo "<td>".$status."</td>";
											echo "<td>".$name."</td></tr> ";
										}
										echo '</table>';
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
            </div>
        </div>



