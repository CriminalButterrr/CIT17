<?php 
    include_once 'config.php'; 
    
    // $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    if($conn->connect_error){  
        die("Connection Failed: " . $conn->connect_error);  
    } 
 
?>  