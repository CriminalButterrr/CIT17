<?php

require 'dbcon.php';
//Create Event Handler
if(isset($_POST['add_course']))
{
    $courseName = mysqli_real_escape_string($con, $_POST['courseName']);
    $credits = mysqli_real_escape_string($con, $_POST['credits']);
    $instructorId = mysqli_real_escape_string($con, $_POST['instructorId']);

    if($courseName == NULL || $credits == NULL || $instructorId == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO courses (CourseName,Credits,InstructorId) VALUES ('$courseName','$credits','$instructorId')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Course Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Course Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

//Read Event Handler
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM courses WHERE CourseID = '$id'";
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


if(isset($_POST['update_course']))
{
    $courseId = mysqli_real_escape_string($con, $_POST['edit_courseId']);
    $courseName = mysqli_real_escape_string($con, $_POST['edit_courseName']);
    $credits = mysqli_real_escape_string($con, $_POST['edit_credits']);
    $instructorId = mysqli_real_escape_string($con, $_POST['edit_instructorId']);

    if($courseName == NULL || $credits == NULL || $instructorId == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE courses SET CourseName='$courseName', Credits='$credits', InstructorId='$instructorId' WHERE CourseId='$courseId'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Course Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Course Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_course']))
{
    $course_id = mysqli_real_escape_string($con, $_POST['course_id']);

    $query = "DELETE FROM courses WHERE CourseId='$course_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Course Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Course Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>