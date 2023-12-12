<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark min-vh-100" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                  <span class="fs-4">Sidebar</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                      Users
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Students
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                      Instructors
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                      Course
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-white">
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


            <div class="col mx-3">
              <h1 class="my-5">Students</h1>
              <div class="card shadow">
                  <!-- Card Header - Dropdown -->
                  <div
                      class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 me-auto font-weight-bold">Users Table</h6>
                      <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#userAddModal"><i class="fa-solid fa-plus me-1"></i>Add User</button>
                      <button type="button" class="btn btn-warning mx-1"><i class="fa-solid fa-pencil me-1"></i>Edit User</button>
                      <button type="button" class="btn btn-danger mx-1"><i class="fa-solid fa-trash-can me-1"></i> Delete User</button>
                  </div>
                  <!-- Card Body -->
                    <div class="card-body">
                      <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'setup.php';

                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($conn, $query);

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

    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                  <div id="errorMessage" class="alert alert-warning d-none"></div>
                    
                  <div class="mb-3">
                      <label for="firstName">First Name</label>
                      <input type="text" name="firstName" id="firstName" class="form-control" />
                  </div>
                  <div class="mb-3">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" />
                  </div>
                  <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control" />
                  </div>
                  <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                  </div>
                  <div class="mb-3">
                      <label for="phone">Phone</label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9b096429f8.js" crossorigin="anonymous"></script>

    <script>
      $(document).on('submit', '#addUserForm', function (e) {
          e.preventDefault();

          var formData = new FormData(this);
          formData.append("add_user", true);

          $.ajax({
              type: "POST",
              url: "eventHandler.php",
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
                      $('#studentAddModal').modal('hide');
                      $('#addUserForm')[0].reset();


                      $('#myTable').load(location.href + " #myTable");

                  }else if(res.status == 500) {
                      alert(res.message);
                  }
              }
          });

      });
    </script>
</body>
</html>