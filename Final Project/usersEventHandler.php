<?php

require 'dbcon.php';
//Create Event Handler
if(isset($_POST['add_user']))
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

    $query = "INSERT INTO users (FirstName,LastName,Email,PhoneNum) VALUES ('$firstName','$lastName','$email','$phone')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'User Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'User Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

//Read Event Handler
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM users WHERE UserID = '$id'";
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


if(isset($_POST['update_user']))
{
    $userId = mysqli_real_escape_string($con, $_POST['edit_userId']);
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

    $query = "UPDATE users SET FirstName='$firstName', LastName='$lastName', Email='$email', PhoneNum='$phone' WHERE UserId='$userId'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'User Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'User Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $query = "DELETE FROM users WHERE UserId='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'User Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'User Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>