<?php
$conn = new mysqli("localhost", "root", "", "simpledb");
if($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}
?>
