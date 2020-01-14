<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="user">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
    <div class="SolveTickets" id="effectblue">
        <div class="SolveTicketsHeader" id="effectteal">
            <h2>Choose ticket for solving</h2>
            <div class="rSolveTicket">
                <div class='Solvetype'><h3>Type</h3></div>
                <div class='Solvetitle'><h3>Title</h3></div>
                <div class='Solvedate'><h3>Date</h3></div>
                <div class='Solvecompany'><h3>Company</h3></div>
                <div class='Solvedetails'><h3>Details</h3></div>
            </div>
        </div>
        <?php
        $TableName = 'ticket';
        include 'connect.php';
        $query = "SELECT TicketID, Title, Opening_Date, Type, employee.Company_Name FROM " . $TableName . "
	JOIN employee ON ticket.UserID = employee.UserID  WHERE Status =?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            $status = 'Sent';
            mysqli_stmt_bind_param($stmt, 's', $status);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $id, $title, $date, $type, $company);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo '<p>There are no data!</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        ?>
                        <div class="SolveTicket" id="effectlblue">
                            <div class='Solvetype'><p><?php echo $type; ?></p></div>
                            <div class='Solvetitle'><p><?php echo $title; ?></p></div>
                            <div class='Solvedate'><p><?php echo $date; ?></p></div>
                            <div class='Solvecompany'><p><?php echo $company; ?></p></div>
                            <div class='Solvedetails'><p><?php echo "<a href='index.php?page44=ModMessage.php-" . $id . "'>Details</a>" ?></p></div>
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
        mysqli_stmt_close($stmt);
        ?>
    </div>
    <div class="SolveTickets" id="effectblue">
        <div class="SolveTicketsHeader" id="effectteal">
            <h2>My tickets</h2>
            <div class="rSolveTicket">
                <div class='Solvetype'><h3>Type</h3></div>
                <div class='Solvetitle'><h3>Title</h3></div>
                <div class='Solvedate'><h3>Date</h3></div>
                <div class='Solvecompany'><h3>Company</h3></div>
                <div class='Solvedetails'><h3>Details</h3></div>
            </div>
        </div>
        <?php
        $TableName = 'ticket';
        $query = "SELECT TicketID, Title, Opening_Date, Type, Employee.Company_Name FROM " . $TableName . "
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
                    echo '<p>There are no data!</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        ?>
                        <div class="SolveTicket" id="effectlblue">
                            <div class='Solvetype'><p><?php echo $type; ?></p></div>
                            <div class='Solvetitle'><p><?php echo $title; ?></p></div>
                            <div class='Solvedate'><p><?php echo $date; ?></p></div>
                            <div class='Solvecompany'><p><?php echo $company; ?></p></div>
                            <div class='Solvedetails'><p><?php echo "<a href='index.php?page44=ModMessage.php-" . $id . "'>Details</a>" ?></p></div>
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
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
    </div>
</div>
