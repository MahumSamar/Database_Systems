<?php

// define('DB_SERVER','localhost');
// define('DB_USERNAME','root');
// define('DB_PASSWORD','');
// define('DB_NAME','service');

// //connection

// $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// //check
// if($conn == false){
//     dir('Error connecting the database');
// }
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "multiservices";

$conn = new mysqli($serverName, $userName, $password, $database);



?>
