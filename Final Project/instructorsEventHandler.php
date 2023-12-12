<?php

require 'dbcon.php';
//Create Event Handler
if(isset($_POST['add_instructor']))
{
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO instructors (FirstName,LastName,Email,PhoneNum) VALUES ('$firstName','$lastName','$email','$phone')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Instructor Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Instructor Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

//Read Event Handler
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM instructors WHERE InstructorID = '$id'";
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


if(isset($_POST['update_instructor']))
{
    $instructorId = mysqli_real_escape_string($con, $_POST['edit_instructorId']);
    $firstName = mysqli_real_escape_string($con, $_POST['edit_firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['edit_lastName']);
    $email = mysqli_real_escape_string($con, $_POST['edit_email']);
    $phone = mysqli_real_escape_string($con, $_POST['edit_phone']);

    if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE instructors SET FirstName='$firstName', LastName='$lastName', Email='$email', PhoneNum='$phone' WHERE InstructorId='$instructorId'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Instructor Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Instructor Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_instructor']))
{
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "DELETE FROM instructors WHERE InstructorId='$instructor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Instructor Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Instructor Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>