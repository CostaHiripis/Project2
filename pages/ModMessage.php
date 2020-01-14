<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="user">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
    <h1>Ticket</h1>
    <?php
    $id = $_SESSION['ticket'];
    include 'connect.php';
    if (isset($_POST['delete'])) {
        $TableName = 'ticket';
        $id = $_SESSION['ticket'];
        $query = "DELETE FROM " . $TableName . " WHERE TicketID LIKE ?";
        If ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            If (mysqli_stmt_execute($stmt)) {
                echo 'Ticket deleted';
                die();
            } else {
                echo 'error454';
            }
        } else {
            echo 'error45444';
        }
        mysqli_stmt_close($stmt);
    }
    if (isset($_POST['choose'])) {
        $TableName = 'ticket';
        $query = "UPDATE " . $TableName . " SET Status=?, AdminID=? WHERE TicketID=?";
        $status = 'In process';
        $admin = $_SESSION['id'];
        If ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'ssi', $status, $admin, $id);
            If (mysqli_stmt_execute($stmt)) {
                
            } else {
                echo 'Error200';
            }
        } else {
            echo 'Error200';
        }
        mysqli_stmt_close($stmt);
    }
    If (isset($_POST['send'])) {
        if (empty($_POST['message'])) {
            echo 'Message is empty!';
        } else {
            $TableName = 'message';
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if (!filter_var($message, FILTER_SANITIZE_STRING) === false) {
                If ($message !== $_SESSION['conn']) {
                    $ticketID = $_SESSION['ticket'];
                    $date = date("Y-m-d");
                    $sender = $_SESSION['id'] . 'ad';
                    $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
                    If ($stmt = mysqli_prepare($conn, $query)) {
                        mysqli_stmt_bind_param($stmt, 'siss', $message, $ticketID, $date, $sender);
                        If (mysqli_stmt_execute($stmt)) {
                            echo '<p>Message Sended</p>';
                            $_SESSION['conn'] = $message;
                        } else {
                            echo '<p>Error7!</p>';
                        }
                    } else {
                        echo '<p>Error6!</p>';
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo '<p>Invalid message!</p>';
                }
            }
        }
    }
    $TableName = 'ticket';
    $query = "SELECT TicketID, Title, Content, Status, Type, employee.Employee_Name, employee.Company_Name FROM " . $TableName .
            " JOIN employee ON ticket.UserID = employee.UserID WHERE TicketID = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $title, $content, $status, $type, $name, $company);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0) {
                echo '<p>Empty!</p>';
            } else {
                while (mysqli_stmt_fetch($stmt)) {
                    echo '<p>Title: ' . $title . '</p>';
                    echo '<p>Type: ' . $type . '</p>';
                    echo '<p>Name: ' . $name . '</p>';
                    echo '<p>Company: ' . $company . '</p>';
                    echo '<p>Content: ' . $content . '</p>';
                    if ($status == 'Sent') {
                        ?>
                        <form method='post'>
                            <input type='submit' name='choose' value='Choose'>
                        </form>
                        <?php
                    }
                }
            }
        } else {
            echo 'Error3';
        }
    } else {
        echo 'Error2';
    }
    mysqli_stmt_close($stmt);
    $TableName = 'ticket';
    $query = "SELECT Status FROM " . $TableName .
            " WHERE TicketID LIKE ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $status);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0) {
                echo '<p>Empty!</p>';
            } else {
                while (mysqli_stmt_fetch($stmt)) {
                    if ($status !== 'Sent') {
                        ?>
                        <h2>Messages</h2>
                        <?php
                        $TableName = 'message';
                        $query = 'SELECT Content, Date, SenderID FROM ' . $TableName;
                        If ($stmt = mysqli_prepare($conn, $query)) {
                            If (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_bind_result($stmt, $content2, $date2, $sender2);
                                mysqli_stmt_store_result($stmt);
                                if (mysqli_stmt_num_rows($stmt) == 0) {
                                    echo '<p>Empty!</p>';
                                } else {
                                    while (mysqli_stmt_fetch($stmt)) {
                                        $sender3 = $_SESSION['id'] . 'ad';
                                        if ($sender2 === $sender3) {
                                            echo ' My message: ';
                                            echo $content2;
                                        } else {
                                            echo 'Client: ';
                                            echo $content2;
                                        }
                                    }
                                }
                            } else {
                                echo '<p>Error9!</p>';
                            }
                        } else {
                            echo '<p>Error8!</p>';
                        }
                        if (isset($_POST['close'])) {
                            $TableName = 'Ticket';
                            $query = "UPDATE " . $TableName . " SET Closing_Date=?, Status=? WHERE TicketID = ?";
                            $status = 'Closed';
                            $date = date("Y-m-d");
                            If ($stmt = mysqli_prepare($conn, $query)) {
                                mysqli_stmt_bind_param($stmt, 'ssi', $date, $status, $id);
                                If (mysqli_stmt_execute($stmt)) {
                                    
                                } else {
                                    echo 'error454';
                                }
                            } else {
                                echo 'error45444';
                            }
                        }
                        $TableName = 'ticket';
                        $query = "SELECT Status FROM " . $TableName .
                                " WHERE TicketID = ?";
                        if ($stmt = mysqli_prepare($conn, $query)) {
                            mysqli_stmt_bind_param($stmt, 's', $id);
                            if (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_bind_result($stmt, $status);
                                mysqli_stmt_store_result($stmt);
                                if (mysqli_stmt_num_rows($stmt) == 0) {
                                    echo '<p>Empty!</p>';
                                } else {
                                    while (mysqli_stmt_fetch($stmt)) {
                                        if ($status !== 'Closed') {
                                            ?>
                                            <h2>Message</h2>
                                            <form method='post'>
                                                <textarea name="message"></textarea>
                                                <input type='submit' name='send' value='Send'>
                                            </form>
                                            <form method='post'>
                                                <input type='submit' name='close' value='Close ticket'>
                                            </form>
                                            <form method='post'>
                                                <input type='submit' name='delete' value='Delete ticket'>
                                            </form>

                                            <?php
                                        }
                                    }
                                }
                            } else {
                                echo 'errorrrr';
                            }
                        } else {
                            echo 'error445';
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
    ?>
    <a href='index.php?page4=ModSolveTickets.php'>Solve tickets</a>
</div>
