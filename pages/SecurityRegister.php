<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="admin">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z']*">
        <input type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z']*">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="level" placeholder="Level of Rights">
        <input type="password" name="pw" placeholder="Password">
        <input type="password" name="pwr" placeholder="Repeat Password">
        <div id='bla'>
            <img id="fileselect" src="#"/>
        </div>
        <input id='choose' type='file' name="photo" onchange="readURL(this);">
        <?php
        if (isset($_POST['register'])) {
            include 'connect.php';
            If (empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr'])
                    OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['level'])) {
                echo "<p>Please fill all empty space!</p>";
            } else {
                If ($_POST['pw'] == $_POST['pwr']) {
                    $TableName = "admin";
                    $fname = $_POST['firstname'];
                    $lname = $_POST['lastname'];
                    $name = $fname . ' ' . $lname;
                    $password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                        if (!filter_var($name, FILTER_SANITIZE_STRING) === false) {
                            $level = $_POST['level'];
                            if (!file_exists('../avatar/' . $fname . '-' . $lname)) {
                                mkdir('../avatar/' . $fname . '-' . $lname, 0777, true);
                            }
                            if ((($_FILES["photo"]["type"] == "image/png") OR ($_FILES["photo"]["type"] == "image/jpeg") OR ($_FILES["photo"]["type"] == "image/jpg"))
                                    AND ($_FILES["photo"]["size"] < 600000)) {
                                if ($_FILES["photo"]["error"] > 0) {
                                    echo "<p>Error!</p>";
                                } else {
                                    if (file_exists('../avatar/' . $fname . '-' . $lname . '/' . $_FILES["photo"]["name"])) {
                                        echo $_FILES["photo"]["name"] . " already exists. ";
                                    } else {
                                        move_uploaded_file($_FILES["photo"]["tmp_name"], '../avatar/' . $fname . '-' . $lname . '/' . $_FILES["photo"]["name"]);
                                        $path = '../avatar/' . $fname . '-' . $lname . '/' . $_FILES["photo"]["name"];
                                        $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?,?)";
                                        If ($stmt = mysqli_prepare($conn, $query)) {
                                            mysqli_stmt_bind_param($stmt, 'sssss', $email, $name, $password_hash, $level, $path);
                                            If (mysqli_stmt_execute($stmt)) {
                                                echo '<p>New admin was created!</p>';
                                            } else {
                                                echo "Data has not been inserted";
                                            }
                                            mysqli_stmt_close($stmt);
                                        } else {
                                            echo '<p>Error!</p>';
                                        }
                                    }
                                }
                            } else {
                                echo '<p class="red">Invalid file!</p>';
                            }
                        } else {
                            echo '<p>Passwords are not the same!</p>';
                        }
                    } else {
                        echo '<p>Invalid Name!</p>';
                    }
                } else {
                    echo '<p>Invalid Email!</p>';
                }
            }
            mysqli_close($conn);
        }
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

    <a href='index.php?page5=SecurityMainPage.php'><div class="toplogout"></div></a>
</div>
