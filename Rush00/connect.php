<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "Dilapisho15";
$db = "rush01";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());
$sql = "USE rush01";
if (!mysqli_query($conn, $sql))
        die ("Cant Use the db");
?>
