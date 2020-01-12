<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../CSS/boxstyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Security Main Page</title>
    </head>
    <body>
        <div id="fullPage">
            <div id="header">
                <a href="SecurityMainPage.php"><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
                <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
            </div>
        </div>
 <a href='index.php?page=logout'><div  class="logout"> <p>Log out</p> </div></a>
        <div> 
           
            <form  id="skrREG" method="post">
                <input  class="skrInput" type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z']*">
                <input  class="skrInput" type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z']*">
                <input  class="skrInput" type="email" name="email" placeholder="Email">
                <input  class="skrInput" type="text" name="level" placeholder="Level of Rights">
                <input  class="skrInput" type="password" name="pw" placeholder="Password">
                <input  class="skrInput" type="password" name="pwr" placeholder="Repeat Password">

                <?php
                if (isset($_POST['register'])) {
                    $dbName = 'helpdesk';
                    $conn = mysqli_connect("127.0.0.1", "root", "", $dbName) OR DIE('Error');
                    if (mysqli_select_db($conn, $DBName)) {
                        If (empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr'])
                                OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['level'])) {
                            echo "<p>Please fill all empty space!</p>";
                        } else {
                            If ($_POST['pw'] == $_POST['pwr']) {
                                $TableName = "Admin";
                                $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
                                $password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
                                $email = $_POST['email'];
                                $level = $_POST['level'];
                                $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
                                If ($stmt = mysqli_prepare($conn, $query)) {
                                    mysqli_stmt_bind_param($stmt, 'ssss', $email, $name, $password_hash, $level);
                                    If (mysqli_stmt_execute($stmt)) {
                                        echo '<p>New admin was created!</p>';
                                    } else {
                                        echo "Data has not been inserted";
                                    }
                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo '<p>Error!</p>';
                                }
                            } else {
                                echo '<p>Passwords are not the same!</p>';
                            }
                        }
                    } else {
                        die(mysqli_error($conn));
                    }
                    mysqli_close($conn);
                }
                ?>
                <input class="skrInput" type="submit" name="register" value="Register">
            </form>
        </div>
        <a href='index.php?page5=SecurityMainPage.php'><div class="logout"><p>Main Page</p></div></a>

    </body>
</html>