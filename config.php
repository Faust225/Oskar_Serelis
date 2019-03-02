<?php

$host = 'localhost';
$dbname = 'test';
$dbuser = 'root';
$dbpass = '';


//Create connection and select DB
$connect = new mysqli($host, $dbuser, $dbpass, $dbname);

if($connect->connect_error){
    die("Unable to connect database: " . $connect->connect_error);
}
?>