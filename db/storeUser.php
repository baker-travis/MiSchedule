<?php
session_start();

$_SESSION['user'] = $_POST;

echo $_SESSION['user']['image']['url'];

?>