<?php

$serverName = "db";
$dBUsername = "admin";
$dbBPassword = "test";
$dBName = "database";

$conn = mysqli_connect($serverName,$dBUsername,$dbBPassword,$dBName);

if(!$conn)   {
    die("Konexio amaituta" . mysqli_connect_error());
}