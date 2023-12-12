<?php

require 'dbcon.php';
//Create Event Handler
if(isset($_POST['add_student']))
{
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $birthDate = mysqli_real_escape_string($con, $_POST['birthDate']);

    if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL || $birthDate == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO students (FirstName,LastName,Email,PhoneNum,BirthDate) VALUES ('$firstName','$lastName','$email','$phone','$birthDate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

//Read Event Handler
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM students WHERE StudentID = '$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch data and encode it as JSON
        $row = $result->fetch_assoc();

        // Return the fetched data as a JSON response
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        echo "No data found for this ID";
    }
    $con->close(); 
}


if(isset($_POST['update_student']))
{
    $studentId = mysqli_real_escape_string($con, $_POST['edit_studentId']);
    $firstName = mysqli_real_escape_string($con, $_POST['edit_firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['edit_lastName']);
    $email = mysqli_real_escape_string($con, $_POST['edit_email']);
    $phone = mysqli_real_escape_string($con, $_POST['edit_phone']);
    $birthDate = mysqli_real_escape_string($con, $_POST['edit_birthDate']);

    if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL || $birthDate == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE students SET FirstName='$firstName', LastName='$lastName', Email='$email', PhoneNum='$phone', BirthDate='$birthDate' WHERE StudentId='$studentId'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM students WHERE StudentId='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>