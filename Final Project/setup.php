<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$databaseName = "student_information_system"; // Change this to your desired database name

// Check connection
if ($conn->connect_error) {
    $error_message = "Connection failed: " . $conn->connect_error;
} else {
    // Create the database if it doesn't exist
    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
    if ($conn->query($createDatabaseQuery) === TRUE) {
        $success_message = "Database '$databaseName' created successfully";

        // Select the created database
        $conn->select_db($databaseName);

        // Create tables if they don't exist
        $createTableQueries = [
            "CREATE TABLE IF NOT EXISTS users (
                UserId INT NOT NULL AUTO_INCREMENT,
                FirstName VARCHAR(50) NOT NULL,
                LastName VARCHAR(50) NOT NULL,
                Email VARCHAR(255) NOT NULL,
                PhoneNum VARCHAR(15) NOT NULL,
                PRIMARY KEY (UserId)
            )",
            "CREATE TABLE IF NOT EXISTS students (
                StudentId INT NOT NULL AUTO_INCREMENT,
                FirstName VARCHAR(50) NOT NULL,
                LastName VARCHAR(50) NOT NULL,
                BirthDate DATE NOT NULL,
                Email VARCHAR(255) NOT NULL,
                PhoneNum VARCHAR(15) NOT NULL,
                PRIMARY KEY (StudentId)
            )",
            "CREATE TABLE IF NOT EXISTS instructors (
                InstructorId INT NOT NULL AUTO_INCREMENT,
                FirstName VARCHAR(50) NOT NULL,
                LastName VARCHAR(50) NOT NULL,
                Email VARCHAR(255) NOT NULL,
                PhoneNum VARCHAR(15) NOT NULL,
                PRIMARY KEY(InstructorId)
            )",
            "CREATE TABLE IF NOT EXISTS courses (
                CourseId INT NOT NULL AUTO_INCREMENT,
                CourseName VARCHAR(50) NOT NULL,
                Credits DECIMAL(2,1) NOT NULL,
                InstructorId INT NOT NULL,
                PRIMARY KEY (CourseID),
                FOREIGN KEY (InstructorId) REFERENCES instructors(InstructorId)
            )",
            "CREATE TABLE IF NOT EXISTS enrollments (
                EnrollmentId INT NOT NULL AUTO_INCREMENT,
                StudentId INT NOT NULL,
                CourseId INT NOT NULL,
                EnrollmentDate DATE NOT NULL,
                Grade INT NOT NULL,
                PRIMARY KEY(EnrollmentId),
                FOREIGN KEY(StudentId) REFERENCES students(StudentId),
                FOREIGN KEY(CourseId) REFERENCES courses(CourseId)
            )"
            // Add more table creation queries here...
            // Example:
            // "CREATE TABLE IF NOT EXISTS table3 (
            //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            //     column1 VARCHAR(50) NOT NULL,
            //     column2 DATE NOT NULL
            // )",
        ];

        $success_table_message = "";
        foreach ($createTableQueries as $query) {
            if ($conn->query($query) === TRUE) {
                // Concatenate success messages for each table creation
                $success_table_message .= "Table created successfully<br>";
            } else {
                $error_message = "Error creating tables: " . $conn->error;
            }
        }

        $success_message .= "<br>$success_table_message";
    } else {
        $error_message = "Error creating database: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

?>