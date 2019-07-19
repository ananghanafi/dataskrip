<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dataskripsi";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if ($conn) {
    
} else {
    echo mysqli_error;
}
?>

