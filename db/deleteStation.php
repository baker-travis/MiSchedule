<?php

include "database_setup.php";

$SID = mysqli_real_escape_string($con, $_POST["sid"]);

$sql = "DELETE FROM Stations
WHERE SID='$SID'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>