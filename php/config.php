<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "peoplesync";


$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);


if(!$conn){

    die("Database gagal terhubung: " . mysqli_connect_error());

}

?>