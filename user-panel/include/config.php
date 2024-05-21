<?php

$servername = "localhost";
$username = "pytndcmy_MRR_USER01";
$password = "MRR@123!@#";
$dbname = "pytndcmy_medicalrecordsreform";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
