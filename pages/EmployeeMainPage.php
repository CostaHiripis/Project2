
<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="admin">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
          <div class="BgTickets" id="effectblue">
              <div class="TicketsHeader" id="effectteal">
                  <h3 id="h3summ">Your Open Tickets</h3>
                  <a href="index.php?page2=EmployeeCreateTicket.php"><div class="CreateTicket" id="effectlblue"><h3 class="CreateText">+ Create a ticket</h3></div></a>
              </div>
              <div class="TicketsBody">
            <?php
            $TableName = 'ticket';
            $idd = $_SESSION['id'];
            include 'connect.php';
            $query = "SELECT TicketID, Title, Opening_Date, Status, admin.Admin_Name, admin.ImagePath FROM " . $TableName . "
			 LEFT JOIN admin ON ticket.AdminID = admin.AdminID WHERE UserID = ? ";
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 'i', $idd);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id, $title, $date, $status, $name, $path);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo '<h3 id="noTicket">There is no data</h3>';
                    } else {
                      while (mysqli_stmt_fetch($stmt)) {
                      echo '<a href="index.php?page22=EmployeeMessage.php-'.$id.'">'?>
                        <div class="Ticket" id="effectlblue">
                          <div class="TName"><?php echo $title."</div>";?>
                          <div class="TDate"><?php echo $date."</div>";
                          if ($status == 'Sent') { ?>
                              <div class="Status1"></div>
                          <?php } elseif ($status == 'In process') { ?>
                              <div class="Status2"></div>
                          <?php } else { ?>
                              <div class="Status3"></div>
                          <?php }?>
                          <div class='Prof'>
                            <?php if($path != NULL || $name != NULL) {?>
                              <img class="HelperPic" src=<?php echo $path;?> alt="userPic">
                            <?php } ?>
                          </div>
                            <?php echo "<div class='HName'><h2>".$name."</h2></div>"; ?>
                        </div></a>
                        <?php
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
