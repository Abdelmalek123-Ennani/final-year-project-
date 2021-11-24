<?php

$username = "root";
$servername = "localhost";
$db_name = "db_pfe";
$password = "";


$connect = mysqli_connect($servername, $username, $password, $db_name);


if (!$connect) {
    die('failed');
}
