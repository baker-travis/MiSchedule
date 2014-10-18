<?php

include "database_setup.php";

$getUsersSQL = "SELECT * FROM Schedule";

$result = mysqli_query($con, $getUsersSQL);

$userData = array();

while($var = mysqli_fetch_object($result)) {
    $userData[] = $var;
}

echo json_encode($userData);

?>