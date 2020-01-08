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
            <div class="BgTickets" id="effectblue">
                <div class="TicketsHeader" id="effectteal">
                    <h3>Your Open Tickets</h3>
                    <a href="AddTicket.php"><div class="CreateTicket" id="effectlblue">+ Create A New Ticket</div></a>
                </div>

                <?php
                include 'connect.php';
                ?>
            </div>
        </div>
    </body>
</html>
