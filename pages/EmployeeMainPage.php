
<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="admin">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
</div>
<div class="BgTickets">
    <div class="TicketsHeader" id="effectteal">
        <h3>Your Open Tickets</h3>
        <a href="index.php?page2=EmployeeCreateTicket.php"><div class="CreateTicket" id="effectlblue"><h3 class="CreateText">+ Create a ticket</h3></div></a>
    </div>
    <div class="TicketsBody">
        <div class="over">
            <?php
            $TableName = 'ticket';
            $idd = $_SESSION['id'];
            include 'connect.php';
            $query = "SELECT TicketID, Title, Opening_Date, Status, admin.Admin_Name, admin.ImagePath FROM " . $TableName . "
			 JOIN admin ON ticket.AdminID = admin.AdminID WHERE UserID = ? ORDER BY TicketID DESC";
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 'i', $idd);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id, $title, $date, $status, $name, $path);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo '<h3 id="noTicket">There is no data</h3>';
                    } else {
                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<a href='index.php?page22=EmployeeMessage.php-" . $id . "'><div class='Ticket' id='effectlblue'>";
                            echo "<div class='TicketLeft'>";
                            echo "<div class='Name'>" . $title . "&nbsp;</div>";
                            ?>
                            <div class='Status'>
                                <?php
                                if ($status == "Sent") {
                                    ?>
                                    <div class="Status1"></div>
                                    <?php
                                } elseif ($status == "In Progress") {
                                    ?>
                                    <div class="Status2"></div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="Status3"></div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            echo "</div>";
                            echo "<div class='TicketRight'>";
							if(($name == NULL) OR ($path == NULL)){
								echo '<div class="Helper"><div class="Text">Did not chosen</div></div>';
                            } else {
								echo "<div class='Helper'><div class='Text'>" . $name . "</div>";
								?>
                            <img id='HelperPic' class='imgRound' src='<?php
                                 If ($path == NULL) {
                                     echo '../img/defuserpic.png';
                                 } else {
                                     echo $path;
                                 }
                                 ?>' alt='userPic'>
                                 <?php
							}
                                 echo "</div>";
                                 echo "</div>";
                                 echo "</div></a>";
                             }
                         }
                     } else {
                         echo "<p>1</p>";
                         echo "<p>There was an error " . mysqli_errno($conn) . " : " . mysqli_connect_error() . "</p>";
                     }
                 } else {
                     echo "<p>There was an error " . mysqli_errno($conn) . " : " . mysqli_connect_error() . "</p>";
                 }
                 ?>
        </div>
    </div>
</div>
