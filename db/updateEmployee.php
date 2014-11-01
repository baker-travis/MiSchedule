<?php

include "database_setup.php";

$PID = mysqli_real_escape_string($con, $_POST["pid"]);
$firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$role = mysqli_real_escape_string($con, $_POST["role"]);
$rank = mysqli_real_escape_string($con, $_POST["rank"]);

$sql = "UPDATE Employees
SET FirstName='$firstName', LastName='$lastName', Email='$email'";

if ($role != NULL) {
    $sql .= ", Role='$role'";
}

if ($rank != NULL) {
	$sql .= ", employee_rank='$rank'";
}

$sql .= "WHERE PID='$PID'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>