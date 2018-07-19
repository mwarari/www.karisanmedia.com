<?php
$servername = "localhost";
$username = "sueerik_karisan";
$password = "[!RDmN;7FR=B";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
