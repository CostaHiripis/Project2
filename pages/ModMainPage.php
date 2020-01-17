
        <div id="fullPage">
            <div id="header">
                <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
                <div id="user">
                    <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
                   <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
				           <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
                </div>
            </div>
            <div id="section1">
                <div id="boxWide">
                    <a href="index.php?page4=ModSolveTickets.php">
                        <div class="effect ticketBg" id="effectlblue">
                            <div class="textDiv">
                                <h1 class="boxText">Tickets to Solve</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div id="section1">
                <div id="boxWide">
                    <a href="index.php?page4=ModChooseTickets.php">
                        <div class="effect ticketBg" id="effectlblue">
                            <div class="textDiv">
                                <h1 class="boxText">Choose Tickets to Solve</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
