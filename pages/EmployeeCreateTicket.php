<?php
If (isset($_POST['submit'])) {
    If (empty($_POST['content']) OR empty($_POST['title']) OR empty($_POST['type'])) {
        echo "<p>Please fill in your details!</p>";
    } else {
        $TableName = 'ticket';
        $dbName = "HelpDesk";
        $conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE ('Error: '. mysqli_error($conn));
        $_SESSION['conn'] = 'bbfb';
        If ($conn !== $_SESSION['conn']) {
            $title = htmlentities($_POST['title']);
            $type = htmlentities($_POST['type']);
            $date = date("Y-m-d");
            $Uid = $_SESSION['id'];
            $status = 'Sent';
            $content = $_POST['content'];
            $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,NULL,?,?,NULL,?)";
            If ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssssis', $title, $content, $date, $status, $Uid, $type);
                If (mysqli_stmt_execute($stmt)) {
                    echo '<p>Thank you for ticket!</p>';
                    $_SESSION['conn'] = $conn;
                    echo ' <script>window.location.href="index.php";</script>';
                   // header('location: https://operationhelp.serverict.nl/Project-2/pages/index.php');
                } else {
                    var_dump($stmt);
                    echo "<p>There was an error " . mysqli_stmt_errno($stmt) . " : " . mysqli_connect_error() . "</p>";
                    echo "Data has not been inserted";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<p>There was an error " . mysqli_errno($DBConnect) . " : " . mysqli_connect_error() . "</p>";
            }
        }
    }
    mysqli_close($conn);
}
?>

<div id="fullPage">
    <div id="header">
        <a href='index.php?page2=EmployeeMainPage.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <h1 id='white'>Operation Desk</h1>
        <div id="user">
            <p id='userName'><?php echo $_SESSION['name']; ?></p>
            <p id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></p>
        </div>
    </div>
    <div id="main">
        <div class="outer">
            <div class="middle">
                <div style="height:400px" class="inner">
                    <form action="#" method="post">
                        <h2 id="maintitle">Please fill out all the fields!</h2>
                        <input id="title" type="text" name="title" placeholder="Title">
                        <select name='type'>
                            <option value='Hardware'>Hardware</option>
                            <option value='Software'>Software</option>
                            <option value='Wish'>Wish</option>
                        </select>
                        <textarea name="content" placeholder="Description" rows="8" cols="50"></textarea>
                        <div id="errorDiv">
                        </div>
                        <div class="ticketbtn">
                            <input class="inputbtn" type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit']) && (!empty($_POST['title']) || !empty($_POST['content']))) {
    if (isset($_POST['submit'])) {
        header('location: index.php');
    }
} else if (isset($_POST['submit']) && (empty($_POST['title']) || empty($_POST['textarea']))) {
    echo "Fill in all the fields";
}
?>
