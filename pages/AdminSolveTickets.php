<style media="screen">
body{
  background-image: none;
  background-color: rgb(0,100,100);
}
</style>
<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="admin">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
    <div class="BgTickets" id="effectblue">
        <div class="adminSummary" id="effectteal">
            <h3 id="h3summ">Open Tickets</h3>
        </div>
        <table>
        <tr class=tableH id="effectblue">
          <th><h3>Type</h3></th>
          <th><h3>Title</h3></th>
          <th><h3>Date</h3></th>
          <th><h3>Company</h3></th>
          <th><h3>Details</h3></th>
        </tr>
        <div class="TicketsBodyAd">
        <?php
        $TableName = 'ticket';
        include 'connect.php';
        $query = "SELECT TicketID, Title, Opening_Date, Type, employee.Company_Name FROM " . $TableName . "
			   JOIN employee ON ticket.UserID = employee.UserID  WHERE Status = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            $status = 'Sent';
            mysqli_stmt_bind_param($stmt, 's', $status);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $id, $title, $date, $type, $company);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo '<p>There is no data!</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        ?>
                          <tr class="STicket" id="effectlblue">
                            <td><p><?php echo $type; ?></p></td>
                            <td><p><?php echo $title; ?></p></td>
                            <td><p><?php echo $date; ?></p></td>
                            <td><p><?php echo $company; ?></p></td>
                            <td><p><?php echo "<a href='index.php?page33=AdminMessage.php-" . $id . "'>Details</a>" ?></p></td>
                          </tr>
                        <?php
                    }
                }
            } else {
                echo 'Error3';
            }
        } else {
            echo 'Error2';
        }
        mysqli_stmt_close($stmt);
        ?>
        </div>
      </table>
    </div>
    <div class="BgTickets solvedT" id="effectblue">
        <div class="adminSummary" id="effectteal">
            <h3 id="h3summ">My Tickets</h3>
        </div>
        <table>
        <tr class=tableH id="effectblue">
          <th><h3>Type</h3></th>
          <th><h3>Title</h3></th>
          <th><h3>Date</h3></th>
          <th><h3>Company</h3></th>
          <th><h3>Details</h3></th>
        </tr>
        <div class="TicketsBodyAd">
        <?php
        $TableName = 'ticket';
        $query = "SELECT TicketID, Title, Opening_Date, Type, employee.Company_Name FROM " . $TableName . "
			 JOIN employee ON ticket.UserID = employee.UserID
			WHERE Status =?  AND AdminID =?";
        $sta = 'In process';
        $id = $_SESSION['id'];
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'si', $sta, $id);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $id, $title, $date, $type, $company);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo '<p>There is no data!</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        ?>
                        <tr class="solved" id="effectlblue">
                          <td><p><?php echo $type; ?></p></td>
                          <td><p><?php echo $title; ?></p></td>
                          <td><p><?php echo $date; ?></p></td>
                          <td><p><?php echo $company; ?></p></td>
                          <td><p><?php echo "<a href='index.php?page33=AdminMessage.php-" . $id . "'>Details</a>" ?></p></td>
                        </tr>
                        <?php
                    }
                }
            } else {
                echo 'Error3';
            }
        } else {
            echo 'Error2';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
      </div>
      </table>
    </div>
</div>
<div class="space"></div>
