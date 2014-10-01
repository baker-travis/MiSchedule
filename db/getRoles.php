<?php

include "database_setup.php";

$getRolesSQL = "SELECT * FROM Roles";

$result = mysqli_query($con, $getRolesSQL);

$userData = array();

while($var = mysqli_fetch_object($result)) {
    $userData[] = $var;
}

echo json_encode($userData);

?>