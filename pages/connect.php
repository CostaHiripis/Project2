<?php

$dbName = "HelpDesk";
$TicketTable = "ticket";

$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === false) {
    echo "<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_errno($DBConnect) . ": "
    . mysqli_error($DBConnect) . "</p>";
} else {
    $Database = mysqli_select_db($DBConnect, $dbName);
    if ($Database === FALSE) {
        echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno($DBConnect) . ": "
        . mysqli_error($DBConnect) . "</p>";
        mysqli_close($DBConnect);
        $DBConnect = FALSE;
    }
}
?>