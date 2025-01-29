<?php
$host = "localhost";
$username = "root";
$password = "Annu#2005";
$database = "social_app"; 


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "not connected".mysqli_connect_error();
}
else{
// echo "Connected successfully";
}
?>