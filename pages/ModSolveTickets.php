<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="user">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
			<h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>

    <div class="SolveTickets" id="effectblue">
        <div class="SolveTicketsHeader" id="effectteal">
            <h2>My tickets</h2>
        </div>
        <div class="SolveTicketsBody">
            <div class="over"></div>
            <?php
            include 'connect.php';
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
                            <?php echo "<a href='index.php?page44=ModMessage.php-" . $id . "'>" ?>
                            <div class="Ticket" id="effectlblue">
                                <div class="TicketLeft">
                                    <div class='Solvetype'><?php echo $company ?>&nbsp;&nbsp;</div>
                                    <div class='Solvetitle'><?php echo $title ?></div>
                                </div>
                                <div class="TicketRight">
                                    <div class='Solvedate'>&nbsp;&nbsp;<?php echo $date ?></div>
                                    <div class='Solvecompany'><?php echo $type ?></div>

                                </div>
                            </div><?php echo "</a>" ?>                   
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
    </div>
</div>
