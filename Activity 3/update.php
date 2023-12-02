<?php
require_once 'dbConnect.php';

// Update data
$newUsername = $_REQUEST['inputUsername'];
$idToUpdate = $_REQUEST['inputID'];

$sql = "UPDATE users SET username='$newUsername' WHERE id=$idToUpdate";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close connection
$conn->close();
?>
<br>
<a href="index.php" >Go back</a>