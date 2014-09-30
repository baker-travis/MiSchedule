<?php

include "database_setup.php";

$name = mysqli_real_escape_string($con, $_POST["name"]);

$sql = "INSERT INTO Roles (Name)
VALUES ('$name')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "1 role added";
}

?>