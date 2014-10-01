<?php

include "database_setup.php";

$RID = mysqli_real_escape_string($con, $_POST["rid"]);

$sql = "DELETE FROM Roles
WHERE RID='$RID'";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

?>