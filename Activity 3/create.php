<?php
require_once 'dbConnect.php';

// Insert data
$username = $_REQUEST['inputUsername'];
$email = $_REQUEST['inputEmail'];

$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
<br>
<a href="index.php" >Go back</a>