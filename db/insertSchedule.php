<?php

include 'database_setup.php';

$year = mysqli_real_escape_string($con, $_POST["year"]);
$month = mysqli_real_escape_string($con, $_POST["month"]);
$day = mysqli_real_escape_string($con, $_POST["day"]);
$hour = mysqli_real_escape_string($con, $_POST["hour"]);
$minute = mysqli_real_escape_string($con, $_POST["minute"]);
$endHour = mysqli_real_escape_string($con, $_POST["endHour"]);
$endMinute = mysqli_real_escape_string($con, $_POST["endMinute"]);

$employee_id = mysqli_real_escape_string($con, $_POST["pid"]);
$station_id = mysqli_real_escape_string($con, $_POST["sid"]);

$baseDate = $year . "-" . $month . "-" . $day . " ";

$startDate = $baseDate . $hour . ":" . $minute . ":00";

$endDate = $baseDate . $endHour . ":" . $endMinute . ":00";

$insertScheduleQuery = "INSERT INTO Schedule (Station_ID, Start_Date_Time, End_Date_Time, Employee_ID) VALUES ($station_id, '$startDate', '$endDate', $employee_id)";

if (!mysqli_query($con, $insertScheduleQuery)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "Inserted Schedule";
}

?>