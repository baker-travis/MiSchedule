<?php

include "database_setup.php";

$id = mysqli_real_escape_string($con, $_POST["schedule-id"]);

$sql = "DELETE FROM Schedule
WHERE Schedule_ID='$id'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>