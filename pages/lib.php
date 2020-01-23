<?php

include 'connect.php';
if (isset($_POST['register'])) {
    if (empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr'])
            OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['companyname'])) {
        echo "<p>Please fill in your details!</p>";
    } else {
        if ($_POST['pw'] == $_POST['pwr']) {
            $TableName = "employee";
            $fname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $lname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            if ((!filter_var($fname, FILTER_SANITIZE_STRING) === false) OR (!filter_var($lname, FILTER_SANITIZE_STRING) === false)) {
                $name = $fname . ' ' . $lname;
                $password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $company = filter_var($_POST['companyname'], FILTER_SANITIZE_STRING);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    if (!filter_var($fname, FILTER_SANITIZE_STRING) === false) {
                        $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
                        if ($stmt = mysqli_prepare($conn, $query)) {
                            mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $company, $password_hash);
                            if (mysqli_stmt_execute($stmt)) {
                                echo '<p>Thank you for registration!</p>';
                                echo ' <script>window.location.href="index.php";</script>';
                            } else {
                                echo "Data has not been inserted";
                                die();
                            }
                            mysqli_stmt_close($stmt);
                        } else {
                            echo '<p>Error!</p>';
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo '<p>Invalid Company Name!</p>';
                    }
                } else {
                    echo '<p>Invalid Email!</p>';
                }
            } else {
                echo '<p>Passwords are not the same!</p>';
            }
        } else {
            echo '<p>Invalid Name!</p>';
        }
    }
}
mysqli_close($conn);

include 'connect.php';
if (isset($_POST['register'])) {
    if (empty($_POST['email']) OR empty($_POST['pw']) OR empty($_POST['pwr'])
            OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['companyname'])) {
        echo "<p>Please fill in your details!</p>";
    } else {
        if ($_POST['pw'] == $_POST['pwr']) {
            $TableName = "employee";
            $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
            $password_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $company = $_POST['companyname'];
            $query = "INSERT INTO " . $TableName . " VALUES(NULL,?,?,?,?)";
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $company, $password_hash);
                if (mysqli_stmt_execute($stmt)) {
                    echo '<p>Thank you for registration!</p>';
                } else {
                    echo "Data has not been inserted";
                    die();
                }
                mysqli_stmt_close($stmt);
            } else {
                echo '<p>Error!</p>';
            }
        } else {
            echo '<p>Passwords are not the same!</p>';
        }
    }
}
mysqli_close($conn);
?>
