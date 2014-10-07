<?php

include "database_setup.php";

$PID = mysqli_real_escape_string($con, $_POST["pid"]);
$firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$role = mysqli_real_escape_string($con, $_POST["role"]);

$sql = "UPDATE Employees
SET FirstName='$firstName', LastName='$lastName', Email='$email'";

if ($role != null) {
    $sql .= ", Role='$role'";
}

$sql .= "WHERE PID='$PID'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>