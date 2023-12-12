<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-center my-3">
            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
            <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#updateUserModal">Update User</button>
            <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete User</button>
        </div>
        <div class="row">            
            <?php
                include_once("setup.php");
                $sql = "SELECT id, username, email FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="table"> <thead> <tr> <th class="col">ID</th> <th class="col">Username</th> <th class="col">Email</th> </tr> </thead>';
                    while($row = $result->fetch_assoc()) {
                        echo "<tbody> <tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "</tr> </tbody>";
                    }
                    echo '</table>';
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        

    
    </div>
    <!-- Add User Modal-->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabel">Add User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="create.php" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" name="inputUsername" class="form-control" id="inputUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" name="inputEmail" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>            
            
        </form>
        </div>
    </div>
    </div>
    <!-- Update User Modal-->
    <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabel">Update User's Username</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="update.php" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputID" class="form-label">User's ID</label>
                    <input type="number" name="inputID" class="form-control" id="inputID" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" name="inputUsername" class="form-control" id="inputUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>            
            
        </form>
        </div>
    </div>
    </div>
    <!-- Delete User Modal-->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabel">Delete User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="delete.php" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputID" class="form-label">User's ID</label>
                    <input type="number" name="inputID" class="form-control" id="inputID" aria-describedby="emailHelp" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>            
            
        </form>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>