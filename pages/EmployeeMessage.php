<div id="fullPage">
  <div id="header">
      <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
      <div id="admin">
          <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
          <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
      </div>
  </div>
    <div class="space"></div>
    <a class="Back" id="effectblue" href="index.php">My Tickets</a>
    <div class="space"></div>
    <div class="TicketDet space">
      <div class="TicketLeft">
      <h1>Ticket details</h1>
    <?php
    $id = $_SESSION['ticket'];
    include 'connect.php';
				$r = 'e';
				if (isset($_POST['send'])) {
          if (empty($_POST['message'])) {
              echo 'Please fill in the field!';
          } else {
              $TableName = 'message';
              $message = $_POST['message'];
              if ($message !== $r) {
                  $ticketID = $_SESSION['ticket'];
                  $date = date("Y-m-d");
                  $sender = $_SESSION['id'] . 'ad';
                  $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
                  if ($stmt = mysqli_prepare($conn, $query)) {
                      mysqli_stmt_bind_param($stmt, 'siss', $message, $ticketID, $date, $sender);
                      if (mysqli_stmt_execute($stmt)) {
                          $r = $message;
                      } else {
                          echo '<p>Error7!</p>';
                      }
                  } else {
                      echo '<p>Error6!</p>';
                  }
              }
          }
      }
    $TableName = 'ticket';
    $query = "SELECT TicketID, Title, Content, Status, employee.Employee_Name, employee.Company_Name FROM " . $TableName .
            " JOIN employee ON ticket.UserID = employee.UserID WHERE TicketID = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $title, $content, $status, $name, $company);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0) {
                echo '<p>Empty!</p>';
            } else {
                while (mysqli_stmt_fetch($stmt)) {
                    echo '<p>Title: ' . $title . '</p>';
                    echo '<p>Name: ' . $name . '</p>';
                    echo '<p>Company: ' . $company . '</p>';
                    echo '<p>Content: ' . $content . '</p></div>';
                }
            }
        } else {
            echo 'Error3';
        }
    } else {
        echo 'Error2';
    }
    mysqli_stmt_close($stmt);
    if (isset($_POST['choose'])) {
        $TableName = 'ticket';
        $query = "UPDATE " . $TableName . " SET Status=? WHERE TicketID=?";
        $status = 'In process';
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'si', $status, $id);
            if (mysqli_stmt_execute($stmt)) {

            } else {
                echo 'Error200';
            }
        } else {
            echo 'Error200';
        }
    }
    echo "<div class='TicketR'>";
    ?>
    <?php
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
                    if ($status !== 'Sent') {
                        ?>
                        <?php
                        $TableName = 'message';
                        $query = 'SELECT Content, Date, SenderID FROM ' . $TableName. ' WHERE TicketID = ?';
                        if ($stmt = mysqli_prepare($conn, $query)) {
                            mysqli_stmt_bind_param($stmt, 'i', $id);
                            if (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_bind_result($stmt, $content2, $date2, $sender2);
                                mysqli_stmt_store_result($stmt);
                                if (mysqli_stmt_num_rows($stmt) == 0) {
                                    echo '<p>Empty!</p>';
                                } else {
                                    while (mysqli_stmt_fetch($stmt)) {
                                        $sender3 = $_SESSION['id'] . 'ad';
                                        if ($sender2 === $sender3) {
                                            ?><div class="userMsg"><h3><?php echo $content2;?></h3></div><?php
                                        } else {
                                            ?><div class="adminMsg"><h3><?php  echo 'Admin: '; echo $content2;?></h3></div><?php
                                        }
                                    }
                                }
                            } else {
                                echo '<p>Error9!</p>';
                            }
                        } else {
                            echo '<p>Error8!</p>';
                        }
                        mysqli_stmt_close($stmt);
                        echo "</div>";
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
                                        if ($status !== 'Sent') {
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
                                                                <div class="form">
                                                                  <div class="errorDiv">
                                                                    <?php     if (isset($_POST['send'])) {
                                                                            if (empty($_POST['message'])) {
                                                                                echo 'Please fill in the field!';
                                                                            } else {
                                                                                $TableName = 'message';
                                                                                $message = $_POST['message'];
                                                                                if ($message !== $_SESSION['conn']) {
                                                                                    $ticketID = $_SESSION['ticket'];
                                                                                    $date = date("Y-m-d");
                                                                                    $sender = $_SESSION['id'] . 'ad';
                                                                                    $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
                                                                                    if ($stmt = mysqli_prepare($conn, $query)) {
                                                                                        mysqli_stmt_bind_param($stmt, 'siss', $message, $ticketID, $date, $sender);
                                                                                        if (mysqli_stmt_execute($stmt)) {
                                                                                            echo '<script>window.location.reload(true);</script>';
                                                                                            $_SESSION['conn'] = $message;
                                                                                        } else {
                                                                                            echo '<p>Error7!</p>';
                                                                                        }
                                                                                    } else {
                                                                                        echo '<p>Error6!</p>';
                                                                                    }
                                                                                    mysqli_stmt_close($stmt);
                                                                                }
                                                                            }
                                                                        } ?>
                                                                  </div>
                                                                <form method='post'>
                                                                  <textarea maxlength="120" placeholder="Send Message" name="message" rows="5" cols="40"></textarea>
                                                                    <input class="inputbtn" type='submit' name='send' value='Send'>
                                                                </form>
                                                              </div>
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
                            }
                        }
                    }
                }
            }
        }
    }

    ?>
  </div>
</div>
