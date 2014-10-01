<?php

include "database_setup.php";

$PID = mysqli_real_escape_string($con, $_POST["pid"]);

$sql = "DELETE FROM Employees
WHERE PID='$PID'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>