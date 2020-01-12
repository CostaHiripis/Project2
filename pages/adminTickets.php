<!DOCTYPE html>
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
                <img id="logoPic" src="../img/nhl.png" alt="nhl">
                <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
            </div>
            <div class="Ticket" id="effectlblue">
                <div class="TicketLeft">
                    <div class="Name">Tickets&nbsp;</div>
                    <div class="Status"></div>
                </div>
                <div class="TicketRight">
                    <div class="Helper"><div class="Text">Helper Name</div>
                    <img id="HelperPic" src="../img/Jesus.jpg" alt="userPic"><div id="effectblue" class="Drop"><div class="Delete">X</div></div></div>     
				</div>
            </div>
            <div class="BgTickets">
                <div class="TicketsHeader" id="effectteal">
                    <h3>Open Tickets</h3>
                </div>

                <?php
                include 'connect.php';

                $SQLString = "SELECT * FROM " . $TicketTable;

                if ($stmt = mysqli_prepare($DBConnect, $SQLString)) {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $TicketId, $Title, $OpenDat, $CloseDate, $Status, $UserId, $AdminId, $Type);
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo "<h1 id='noTicket'>There are no open tickets</h1>";
                    } else {
                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<a href='Ticket.php?ticket=" . $TicketId . "'><div class='Ticket' id='effectlblue'>";
                                echo "<div class='TicketLeft'>";
                                    echo "<div class='Name'>" . $Title . "&nbsp;</div>";
                                    if ($Status == "Open") {
                                        $color = "Red";
                                    } elseif ($Status == "In Progress") {
                                        $color = "Orange";
                                    } else {
                                        $color = "Green";
                                    }
                                    echo "<div class='Status' style='background-color: " . $color . "'></div>";
                                echo "</div>";
                                echo "<div class='TicketRight'>";
                                    echo "<div class='Helper'><div class='Text'>" . $AdminId . "</div>";
                                    echo "<img id='HelperPic' src='../img/Jesus.jpg'" . " alt='userPic'>"
                                            . "<form method='POST' action='?ticket=$TicketId' class='DropBtn'>"
                                            . "<input class='DropBtn Delete' type='Submit' name='Drop' value='X' id='effectblue'>"
                                            . "</form>"
                                        . "</div>";
                                                if(isset($_POST['Drop'])){
                                                $SQLString2 = "DELETE FROM " . $TicketTable . " WHERE $TicketTable . TicketID = " . $_GET['ticket'];
                                                if($stmt2 = mysqli_prepare($DBConnect, $SQLString2)){
                                                    mysqli_stmt_execute($stmt2);
                                                    header('location: adminTickets.php');
                                                }
                                                mysqli_stmt_close($stmt2);
                                            }
                                echo "</div>";
                            echo "</div></a>";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
