
<div id="fullPage">
  <div id="header">
      <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
      <div id="admin">
          <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
          <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
      </div>
  </div>
    <div id="main">
        <div class="outer">
            <div class="middle">
                <div style="height:400px" class="inner">
                    <form action="#" method="post">
                        <div><a href="index.php"><img id="backbtn" src="../img/back.png" alt="back"></a></div>
                        <h2 id="maintitle">Please fill out all the fields!</h2>
                        <input id="title" type="text" name="title" placeholder="Title">
                        <select id="category" name='type'>
                            <option value="" disabled selected>Category...</option>
                            <option value='Hardware'>Hardware</option>
                            <option value='Software'>Software</option>
                            <option value='Wish'>Wish</option>
                        </select>
                        <textarea name="content" placeholder="Description" rows="8" cols="50"></textarea>
                        <div id="errorDiv">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (empty($_POST['content']) OR empty($_POST['title']) OR empty($_POST['type'])) {
                                    echo "<p>Please fill in your details!</p>";
                                } else {
                                    $TableName = 'ticket';
                                    include 'connect.php';
                                    $content = $_POST['content'];
                                    $_SESSION['conn'] = 'bbfb';
                                    if ($content !== $_SESSION['conn']) {
                                        $title = $_POST['title'];
                                        $type = $_POST['type'];
                                        $date = date("Y-m-d");
                                        $Uid = $_SESSION['id'];
                                        $status = 'Sent';
                                        $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,NULL,?,?,NULL,?)";
                                        if ($stmt = mysqli_prepare($conn, $query)) {
                                            mysqli_stmt_bind_param($stmt, 'ssssis', $title, $content, $date, $status, $Uid, $type);
                                            if (mysqli_stmt_execute($stmt)) {
                                                echo ' <script>window.location.href="index.php";</script>';
                                                echo '<p>Thank you for ticket!</p>';
                                                echo ' <script>window.location.href="index.php";</script>';
                                                $_SESSION['conn'] = $content;
                                            } else {
                                                echo "Data has not been inserted";
                                            }
                                            mysqli_stmt_close($stmt);
                                        } else {
                                            echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
                                        }
                                    }
                                    mysqli_close($conn);
                                }
                            }
                            ?>
                        </div>
                        <div class="ticketbtn">
                            <input class="inputbtn" type="submit" name="submit" value="Submit">
                        </div>
                </div>
            </div>
        </div>
    </div>
