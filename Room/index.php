<?php
include 'room/connect.php';
session_start();


if (isset($_POST['login-submit'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $connect->query($query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];
        $_SESSION["category"] = $row['category'];
        $_SESSION["email"] = $row['email'];

        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {

            if ($row["status"] === "1" && $row["category"] === "USER") {
                $_SESSION['successMessage'] = "Welcome, " . $_SESSION['firstname'] . "";
                header("Location: room/index.php");
            } elseif ($row["status"] === "1" && $row["category"] === "SUPER ADMIN") {
                $_SESSION['successMessage'] = "Welcome, Admin " . $_SESSION['firstname'] . "";
                header("Location: admin/admin.php");
            } elseif ($row['status'] === "1" && $row["category"] === "ADMIN") {
                $_SESSION['successMessage'] = "Welcome, Admin " . $_SESSION['firstname'] . "";
                header("Location: room/index.php");
            } elseif ($row["status"] === "2" && $row["category"] === "USER") {
                $_SESSION["error"] =  "Your account has been rejected. Contact Mr. Deo or Mr. Mike for more info. Thank you.";
            } else {
                $_SESSION["warning"] =  "Please contact Mr. Deo or Mr. Mike for account approval. Thank you";
            }
        } else {
            $_SESSION["error"] = "Wrong Username or Password";
        }
    } else {
        $_SESSION["error"] = "Wrong Username or Password";
    }
}


if (isset($_POST['register'])) {
    $id_number = mysqli_real_escape_string($connect, $_POST['idnumber']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $firstname = mysqli_real_escape_string($connect, $_POST['firstName']);
    $middlename = mysqli_real_escape_string($connect, $_POST['middleName']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contactNumber']);
    $division = $_POST['division'];
    $category = "USER";

    $query2 = "INSERT INTO user(id_number, username, password, firstname, middlename, lastname, email, contactNumber, division, category) 
    VALUES('$id_number', '$username', '$password', '$firstname', '$middlename', '$lastname', '$email', '$contact_number', '$division', '$category')";
    $result2 = $connect->query($query2);

    if ($result2) {
        $_SESSION["success"] = "Successfully Created an Account";
    } else {
        $_SESSION['error'] = "Error";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="room/images/pcn.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <script src="room/strap/jquery.min.js"></script>
    <script src="room/strap/bootstrap.min.js"></script>

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <!-- PushAlert -->
    <!-- <script type="text/javascript">
            (function(d, t) {
                    var g = d.createElement(t),
                    s = d.getElementsByTagName(t)[0];
                    g.src = "https://cdn.pushalert.co/integrate_380cf0527b74bfea4b9b8da3817d55a1.js";
                    s.parentNode.insertBefore(g, s);
            }(document, "script"));
    </script> -->
    <!-- End PushAlert -->

    <title>Login</title>
</head>

<body>
    <?php
    if (isset($_SESSION['success'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo $_SESSION['success']; ?>",
            })
        </script>
    <?php unset($_SESSION['success']);
    }
    ?>
    <?php
    if (isset($_SESSION['error'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "<?php echo $_SESSION['error']; ?>",
            })
        </script>
    <?php unset($_SESSION['error']);
    }
    ?>
    <?php
    if (isset($_SESSION['warning'])) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: "<?php echo $_SESSION['warning']; ?>",
            })
        </script>
    <?php unset($_SESSION['warning']);
    }
    ?>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading pt-3">
                            <img src="room/images/pcn.png" alt="PCN LOGO" class="img-responsive" width="15%">
                            <div class="panel-title text-center" id="title">Room Reservation</div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 forms">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10 forms" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" role="form" style="display: block;">
                                        <div class="form-floating mt-4">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" autocomplete="on" required>
                                            <label class="username" for="username">USERNAME</label>
                                        </div>
                                        <div class="form-floating mt-4">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="current-password" required>
                                            <label class="password" for="password">PASSWORD</label>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="LOGIN"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                        <div class="col-md-6 pt-4 pb-4">
                                            <a href="javascript:void(0)" class="registerAccount link" style="color: #BABABA; ">Register Account here</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <!-- Modal For Registration -->
    <div class="modal fade" id="registerAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="room/images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row g-3 needs-validation">
                        <div class="mb-3">
                            <label for="" class="form-label">ID Number</label>
                            <input type="number" class="form-control" name="idnumber" id="idnumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middleName" id="middleName" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" name="contactNumber" id="contactNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Division</label>
                            <select name="division" class="form-select" id="division" required>
                                <option value="" disabled selected>Select Division Name</option>
                                <option value="BD1">BD1</option>
                                <option value="BD2">BD2</option>
                                <option value="BD3">BD3</option>
                                <option value="BSG">BSG</option>
                                <option value="HR">HR</option>
                                <option value="FINANCE">FINANCE</option>
                                <option value="PPI">PPI</option>
                                <option value="STRAT">STRAT</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="Username" placeholder="Username" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" id="Password" class="form-control" placeholder="Password" autocomplete="current-password" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary button" name="register" id="register">Save changes</button>
                </div>
                </form>
            </div>
        </div>


</body>
<script>
    // Account Registration
    $(document).ready(function() {
        $('.registerAccount').on('click', function() {
            $('#registerAccount').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#job_id').val(data[0]);


        });
    });



    // Function to generate a random unique ID (you can replace this with your own logic)
    function getUniqueId() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (Math.random() * 16) | 0,
                v = c === 'x' ? r : (r & 0x3) | 0x8;
            return v.toString(16);
        });
    }

    // Function to save the unique ID to your database (using AJAX)
    function saveToDatabase(uniqueId) {
        const formData = new FormData();
        formData.append('uniqueId', uniqueId);

        // Send the unique ID to the PHP script using AJAX
        fetch('save-unique-id.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                // Handle the response from the server (e.g., display a message to the user)
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

</html>