<?php

include "database_setup.php";

$SID = mysqli_real_escape_string($con, $_POST["schedule-id"]);
$startHour = mysqli_real_escape_string($con, $_POST["employee-start-hour"]);
$startMin = mysqli_real_escape_string($con, $_POST["employee-start-min"]);
$startAmPm = mysqli_real_escape_string($con, $_POST["employee-start-am-pm"]);
$endHour = mysqli_real_escape_string($con, $_POST["employee-end-hour"]);
$endMin = mysqli_real_escape_string($con, $_POST["employee-end-min"]);
$endAmPm = mysqli_real_escape_string($con, $_POST["employee-end-am-pm"]);
$employeeID = mysqli_real_escape_string($con, $_POST["employee-id"]);
$year = mysqli_real_escape_string($con, $_POST["year"]);
$month = mysqli_real_escape_string($con, $_POST["month"]);
$day = mysqli_real_escape_string($con, $_POST["day"]);

if ($startAmPm == "pm" && $startHour != 12) {
	$startHour += 12;	
}

if ($endAmPm == "pm" && $endHour != 12) {
	$endHour += 12;
}

$baseDate = $baseDate = $year . "-" . $month . "-" . $day . " ";

$startDateTime = $baseDate . $startHour . ":" . $startMin . ":00";

$endDateTime = $baseDate . $endHour . ":" . $endMin . ":00";

$sql = "UPDATE Schedule
SET Start_Date_Time='$startDateTime', End_Date_Time='$endDateTime', Employee_ID='$employeeID'
WHERE Schedule_ID=$SID";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>