
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
                <a href="index.php"><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
                <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
            </div>
            <div class="BgTickets" id="effectblue">
                <div class="TicketsHeader" id="effectteal">
                    <h3>Create A Ticket</h3>
                </div>
                <form method="POST" action="">
                    <input type="text" name="Subject" placeholder="Subject">
                    <select>
                        <option value="Defult">Type</option>
                        <option value="Software">Software</option>
                        <option value="Wish">Wish</option>
                    </select>
                    <textarea name="Issue" placeholder="Issue"></textarea>
                </form>
                <?php
                include 'connect.php';
                ?>
            </div>
        </div>
    </body>
</html>