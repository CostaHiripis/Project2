<div id="fullPage">
    <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
        <div id="admin">
            <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
            <img id='userPic' src=<?php echo $_SESSION['path']; ?> alt="userPic">
            <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
        </div>
    </div>
    <?php
    include 'connect.php';
    if (isset($_GET['AdminID'])) {
        $idd = $_GET['AdminID'];
        $TableName = 'admin';
        $query = "DELETE FROM " . $TableName . " WHERE AdminID = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $idd);
            if (!mysqli_stmt_execute($stmt)) {
                echo 'Error100';
            }
        } else {
            echo 'Error';
        }
        mysqli_stmt_close($stmt);
    } elseif (isset($_GET['UserID'])) {
        $idd = $_GET['UserID'];
        $TableName = 'employee';
        $query = "DELETE FROM " . $TableName . " WHERE UserID = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $idd);
            if (!mysqli_stmt_execute($stmt)) {
                echo 'Error100';
            }
        }
        mysqli_stmt_close($stmt);
    }
    ?>
    <?php
    $TableName = 'admin';
    $query = "SELECT AdminID, Email, Admin_Name, Password, Permission_Level FROM " . $TableName;
    if ($stmt = mysqli_prepare($conn, $query)) {
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $email, $name, $password, $level);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0) {
                echo '<p>There are no data!</p>';
            } else {
                echo "<table width='100%' border='1'>";
                echo "<tr><th>ID</th>
					<th>Email</th>
					<th>Full Name</th>
					<th>Level</th>
					<th>Update</th>
					<th>Delete</th></tr>";
                while (mysqli_stmt_fetch($stmt)) {
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $level . "</td>";
                    echo "<td><a href='index.php?page6=SecurityUpdate.php-" . $id . "'>Update</a></td>";
                    echo "<td><a href='index.php?AdminID=" . $id . "'>Delete</a></td></tr>";
                }
            }
        } else {
            echo 'Error2';
        }
    } else {
        echo 'Error2';
    }
    mysqli_stmt_close($stmt);
    ?>
    <p><a href='index.php?page5=SecurityRegister.php'>Create new Admin<a></p>
                <h1>Users: </h1>
                <?php
                $TableName = 'employee';
                $query = "SELECT UserID, Email, Employee_Name, Company_Name FROM " . $TableName;
                if ($stmt = mysqli_prepare($conn, $query)) {
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_bind_result($stmt, $id, $email, $name, $company);
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) == 0) {
                            echo '<p>There are no data!</p>';
                        } else {
                            echo "<table width='100%' border='1'>";
                            echo "<tr><th>ID</th>    
					<th>Email</th>
					<th>Full Name</th>
					<th>Company</th>
					<th>Delete</th></tr>";
                            while (mysqli_stmt_fetch($stmt)) {
                                echo "<tr><td>" . $id . "</td>";
                                echo "<td>" . $email . "</td>";
                                echo "<td>" . $name . "</td>";
                                echo "<td>" . $company . "</td>";
                                echo "<td><a href='index.php?UserID=" . $id . "'>Delete</a></td></tr>";
                            }
                            echo '</table>';
                        }
                    } else {
                        echo 'Error2';
                    }
                } else {
                    echo 'Error2';
                }
                ?>
                </div>
                </body>
                </html>
