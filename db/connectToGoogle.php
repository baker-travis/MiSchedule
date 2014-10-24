<?php
session_start();

include "database_setup.php";

$PID = mysqli_real_escape_string($con, $_POST["pid"]);
$GOOGLE_ID = mysqli_real_escape_string($con, $_POST["google_id"]);

$sql = "UPDATE Employees
SET google_id = '$GOOGLE_ID'
WHERE PID=$PID";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>