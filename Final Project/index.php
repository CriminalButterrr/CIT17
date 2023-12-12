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
    <?php require_once 'setup.php';?>
    <!-- Add User Modal -->
    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addUser">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="firstName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="firstName">Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="firstName">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
        </div>
    </div>
    </div>
   
    <!-- View User Modal-->
    <div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
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
                        <label for="view_userId">ID</label>
                        <input type="text" class="form-control" id="view_userId" disabled>
                    </div>
                    <div class="form-group">
                        <label for="view_firstName">Name</label>
                        <input type="text" class="form-control" id="view_firstName" disabled>
                    </div>
                    <div class="form-group">
                        <label for="view_lastName">Last Name</label>
                        <input type="text" id="view_lastName" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="view_email">Email</label>
                        <input type="text" id="view_email" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="view_phone">Phone</label>
                        <input type="text" id="view_phone" class="form-control" disabled/>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit User Modal-->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields for displaying data -->
                <form id="editUser">
                <div class="form-group">
                    <label for="edit_userId">ID</label>
                    <input type="text" class="form-control-plaintext" id="edit_userId" name="edit_userId" readonly>
                </div>
                <div class="form-group">
                    <label for="edit_firstName">Name</label>
                    <input type="text" class="form-control" id="edit_firstName" name="edit_firstName" >
                </div>
                <div class="form-group">
                    <label for="edit_lastName">Last Name</label>
                    <input type="text" id="edit_lastName" name="edit_lastName" class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="edit_email">Email</label>
                    <input type="text" id="edit_email" name="edit_email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="edit_phone">Phone</label>
                    <input type="text" id="edit_phone" name="edit_phone" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

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
                    <a href="#" class="nav-link active " aria-current="page">
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
                    <a href="instructor.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Instructors
                    </a>
                </li>
                <li>
                    <a href="course.php" class="nav-link text-white">
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
            <h1 class="my-5">Users</h1>

            <!--Card-->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 me-auto font-weight-bold">Users Table</h6>
                    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#userAddModal"><i class="fa-solid fa-plus me-1"></i>Add User</button>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';

                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $user)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $user['UserId'] ?></td>
                                        <td><?= $user['FirstName'] ?></td>
                                        <td><?= $user['LastName'] ?></td>
                                        <td><?= $user['Email'] ?></td>
                                        <td><?= $user['PhoneNum'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$user['UserId'];?>" class="viewUserBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$user['UserId'];?>" class="editUserBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$user['UserId'];?>" class="deleteUserBtn btn btn-danger btn-sm">Delete</button>
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
        //Add User
        $(document).on('submit', '#addUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("add_user", true);

            $.ajax({
                type: "POST",
                url: "usersEventHandler.php",
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
                        $('#userAddModal').modal('hide');
                        $('#editUser')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        //View User Information
        $(document).on('click', '.viewUserBtn', function () {
            var user_id = $(this).val();

            // AJAX request to fetch data based on ID
            $.ajax({
                url: 'usersEventHandler.php', // PHP script to retrieve data from the database
                type: 'GET',
                data: { id: user_id },
                dataType: 'json',
                success: function(response) {
                    $('#view_userId').val(response.UserId);
                    $('#view_firstName').val(response.FirstName);
                    $('#view_lastName').val(response.LastName);
                    $('#view_email').val(response.Email);
                    $('#view_phone').val(response.PhoneNum);
                    $('#viewUserModal').modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });


        //Edit User Modal
        $(document).on('click', '.editUserBtn', function () {
            var user_id = $(this).val();

            // AJAX request to fetch data based on ID
            $.ajax({
                url: 'usersEventHandler.php', // PHP script to retrieve data from the database
                type: 'GET',
                data: { id: user_id },
                dataType: 'json',
                success: function(response) {
                    $('#edit_userId').val(response.UserId);
                    $('#edit_firstName').val(response.FirstName);
                    $('#edit_lastName').val(response.LastName);
                    $('#edit_email').val(response.Email);
                    $('#edit_phone').val(response.PhoneNum);
                    $('#editUserModal').modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });
        
        //Update User
        $(document).on('submit', '#editUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_user", true);

            $.ajax({
                type: "POST",
                url: "usersEventHandler.php",
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
                        $('#editUserModal').modal('hide');
                        $('#addUser')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.deleteUserBtn', function (e) {
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
                    var user_id = $(this).val();
                    console.log(user_id);
                    $.ajax({
                        type: "POST",
                        url: "usersEventHandler.php",
                        data: {
                            'delete_user': true,
                            'user_id': user_id
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