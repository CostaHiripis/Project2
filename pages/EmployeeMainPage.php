<!DOCTYPE html>
<?php
if (!isset($_SESSION['id'])) {
    session_start();
}
?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stenden HelpDesk</title>
        <link rel="stylesheet" href="../CSS/boxstyle.css">
    </head>
    <body>
        <div id="fullPage">
            <div id="header">
                <a href='index.php?page3=AdminMainScreen.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
                <h1 id='white'>Help Desk</h1>
                <div id="user">
                    <p id='userName'><?php echo $_SESSION['name']; ?></p>
                    <p id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></p>
                </div>
            </div>
        </div>
        <p><a href='index.php?page2=EmployeeCreateTicket.php'>Create new Ticket</a></p>
        <p><a href='index.php?page2=EmployeeTickets.php'>My Tickets</a></p>

    </body>
</html>

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
            $query = "SELECT TicketID, Title, Opening_Date, Status FROM " . $TableName . "
	 WHERE UserID LIKE ? ORDER BY TicketID DESC";
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 'i', $idd);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id, $title, $date, $status);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo '<h3 id="noTicket">There is no data</h3>';
                    } else {

                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<a href='index.php?page22=EmployeeMessage.php-" . $id . "'><div class='Ticket' id='effectlblue'>";
                            echo "<div class='TicketLeft'>";
                            echo "<div class='Name'>" . $title . "&nbsp;</div>";
                            if ($status == "Open") {
                                $color = "Red";
                            } elseif ($status == "In Progress") {
                                $color = "Orange";
                            } else {
                                $color = "Green";
                            }
                            echo "<div class='Status' style='background-color: " . $color . "'></div>";
                            echo "</div>";
                            echo "<div class='TicketRight'>";
                            echo "<div class='Helper'><div class='Text'> helperName </div>" /* $AdminId */;
                            echo "<img id='HelperPic' class='imgRound' src='../img/Jesus.jpg'" . " alt='userPic'>" . "</div>";
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
