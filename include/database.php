<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="login";
$conn_error="Could not connect to database";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die($conn_error. mysqli_connect_error());
}