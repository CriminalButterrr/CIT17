<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>PHP CRUD using jquery ajax without page reload</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <!-- Add Course Modal -->
    <div class="modal fade" id="courseAddModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="courseModalLabel">Add Course</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addCourse">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="courseName">Course Name</label>
                    <input type="text" name="courseName" id="courseName" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="credits">Credits</label>
                    <input type="number" step="any" min="0" max="3.0" name="credits" id="credits" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="instructorId">Instructor</label>
                    <select name="instructorId" id="instructorId" class="form-control"> 
                        <?php 
                            require 'dbcon.php';

                            $query = "select InstructorId, FirstName from instructors";
                            $res = mysqli_query($con, $query); 
                            while ($row = $res->fetch_assoc()) 
                            {
                            echo '<option value=" '.$row['InstructorId'].' "> '.$row['FirstName'].' </option>';
                            } 
                        ?>
                    </option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Course</button>
            </div>
        </form>
        </div>
    </div>
    </div>
   
    <!-- View Course Modal-->
    <div class="modal fade" id="viewCourseModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for displaying data -->
                    <form id="viewForm">
                    <div class="form-group">
                        <label for="view_courseId">Course ID</label>
                        <input type="text" class="form-control" id="view_courseId" disabled>
                    </div>
                    <div class="form-group">
                        <label for="view_courseName">Course Name</label>
                        <input type="text" class="form-control" id="view_courseName" disabled>
                    </div>
                    <div class="form-group">
                        <label for="view_credits">Credits</label>
                        <input type="text" id="view_credits" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="view_instructorId">InstructorId</label>
                        <input type="text" id="view_instructorId" class="form-control" disabled/>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Course Modal-->
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields for displaying data -->
                <form id="editCourse">
                <div class="form-group">
                    <label for="edit_courseId">Instructor ID</label>
                    <input type="text" class="form-control-plaintext" id="edit_courseId" name="edit_courseId" readonly>
                </div>
                <div class="form-group">
                    <label for="edit_courseName">Course</label>
                    <input type="text" class="form-control" id="edit_courseName" name="edit_courseName" >
                </div>
                <div class="form-group">
                    <label for="edit_credits">Credits</label>
                    <input type="text" id="edit_credits" name="edit_credits" step="any" min="0" max="3.0" class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="edit_instructorId">InstructorId</label>
                    <select name="edit_instructorId" id="edit_instructorId" class="form-control"> 
                        <?php 
                            require 'dbcon.php';

                            $query = "select InstructorId, FirstName from instructors";
                            $res = mysqli_query($con, $query); 
                            while ($row = $res->fetch_assoc()) 
                            {
                            echo '<option value=" '.$row['InstructorId'].' "> '.$row['FirstName'].' </option>';
                            } 
                        ?>
                    </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!--Main Content-->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--Sidebar-->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark min-vh-100" style="width: 280px;">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Student Information System</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#index"/></svg>
                    Users
                    </a>
                </li>
                <li>
                    <a href="student.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Students
                    </a>
                </li>
                <li>
                    <a href="instructor.php " class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Instructors
                    </a>
                </li>
                <li>
                    <a href="course.php" class="nav-link active">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                    Courses
                    </a>
                </li>
                <li>
                    <a href="enrollments.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                    Enrollments
                    </a>
                </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                </div>
            </div>

            <!--Main Content-->
            <div class="col mx-3">
            <h1 class="my-5">Courses</h1>

            <!--Card-->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 me-auto font-weight-bold">Courses Table</h6>
                    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#courseAddModal"><i class="fa-solid fa-plus me-1"></i>Add Course</button>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Credits</th>
                                <th>Instructor ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';

                            $query = "SELECT * FROM courses";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $course)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $course['CourseId'] ?></td>
                                        <td><?= $course['CourseName'] ?></td>
                                        <td><?= $course['Credits'] ?></td>
                                        <td><?= $course['InstructorId'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$course['CourseId'];?>" class="viewCourseBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$course['CourseId'];?>" class="editCourseBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$course['CourseId'];?>" class="deleteCourseBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        //Add Course
        $(document).on('submit', '#addCourse', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("add_course", true);

            $.ajax({
                type: "POST",
                url: "coursesEventHandler.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#courseAddModal').modal('hide');
                        $('#editCourse')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        //View Course Information
        $(document).on('click', '.viewCourseBtn', function () {
            var course_id = $(this).val();

            // AJAX request to fetch data based on ID
            $.ajax({
                url: 'coursesEventHandler.php', // PHP script to retrieve data from the database
                type: 'GET',
                data: { id: course_id },
                dataType: 'json',
                success: function(response) {
                    $('#view_courseId').val(response.CourseId);
                    $('#view_courseName').val(response.CourseName);
                    $('#view_credits').val(response.Credits);
                    $('#view_instructorId').val(response.InstructorId);
                    $('#viewCourseModal').modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });


        //Edit Course Modal
        $(document).on('click', '.editCourseBtn', function () {
            var course_id = $(this).val();

            // AJAX request to fetch data based on ID
            $.ajax({
                url: 'coursesEventHandler.php', // PHP script to retrieve data from the database
                type: 'GET',
                data: { id: course_id },
                dataType: 'json',
                success: function(response) {
                    $('#edit_courseId').val(response.CourseId);
                    $('#edit_courseName').val(response.CourseName);
                    $('#edit_credits').val(response.Credits);
                    $('#edit_instructorId').val(response.InstructorId);
                    $('#editCourseModal').modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });

        
        //Update Course
        $(document).on('submit', '#editCourse', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_course", true);

            $.ajax({
                type: "POST",
                url: "coursesEventHandler.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#editCourseModal').modal('hide');
                        $('#addCourse')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.deleteCourseBtn', function (e) {
            e.preventDefault();


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var course_id = $(this).val();
                    console.log(course_id);
                    $.ajax({
                        type: "POST",
                        url: "coursesEventHandler.php",
                        data: {
                            'delete_course': true,
                            'course_id': course_id
                        },
                        success: function (response) {

                            var res = jQuery.parseJSON(response);
                            if(res.status == 500) {

                                alert(res.message);
                            }else{
                                Swal.fire({
                                    title: "Deleted!",
                                    text: res.message,
                                    icon: "success"
                                });

                                $('#myTable').load(location.href + " #myTable");
                            }
                        }
                    });
                }
            });
        });

    </script>

</body>
</html>