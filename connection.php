<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "librarysystem";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("AYAN ERROR MALI CONNECTION NG DB AT PHP". $conn->connect_error);
}


?>