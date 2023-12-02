<?php
require_once 'dbConnect.php';

// Delete data
$idToDelete = $_REQUEST['inputID'];

$sql = "DELETE FROM users WHERE id=$idToDelete";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connection
$conn->close();
?>

<br>
<a href="index.php" >Go back</a>