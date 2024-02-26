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
                $_SESSION["error"] = "Your account has been rejected. Contact Mr. Deo or Mr. Mike for more info. Thank you.";
            } elseif ($row['status'] === "0" && $row["category"] === "VIEWER") {
                $SESSION['successMessage'] = "Welcome";
                header("location: room/index.php");
            } else {
                $_SESSION["warning"] = "Please contact Mr. Deo or Mr. Mike for account approval. Thank you";
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
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $confirmPassword = mysqli_real_escape_string($connect, $_POST['confirmpassword']);
    $firstname = mysqli_real_escape_string($connect, $_POST['firstName']);
    $middlename = mysqli_real_escape_string($connect, $_POST['middleName']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contactNumber']);
    $division = $_POST['division'];
    $category = "USER";

    if ($password === $confirmPassword) {
        $query2 = "INSERT INTO user(id_number, username, password, firstname, middlename, lastname, email, contactNumber, division, category) 
        VALUES('$id_number', '$username', '$passwordHashed', '$firstname', '$middlename', '$lastname', '$email', '$contact_number', '$division', '$category')";
        $result2 = $connect->query($query2);

        if ($result2) {
            $_SESSION["success"] = "Successfully Created an Account";
        } else {
            $_SESSION['error'] = "Error";
        }
    } else {
        $_SESSION['error'] = "Password and Confirm Password does not match. Ipilit mo pa!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="shortcut icon" href="room/images/pcn.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="style.css">

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
        <div class="container position-absolute top-50 start-50 translate-middle">
            <img src="room/images/pcn.png" alt="PCN LOGO" class="img-responsive" width="10%">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 image_login">
                        <div class="container w-100">
                            <img src="room/images/bgs.jpg" width="100%" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="panel">
                                    <div class="panel-heading pt-3">
                                        <div class="panel-title mt-5 text-center" id="title">Login to your account</div>
                                    </div>
                                    <div class="panel-body mt-3">
                                        <div class="row">
                                            <div class="col-lg-12 forms">
                                                <form id="login-form" class="col-lg-offset-1 col-lg-10 forms"
                                                    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                                                    method="post" role="form" style="display: block;">
                                                    <div class="mt-4 d-flex align-items-center">
                                                        <i class="bi bi-person-fill me-2"></i>
                                                        <input type="text" name="username" id="username" tabindex="1"
                                                            class="form-control" placeholder="Username"
                                                            autocomplete="on" required>

                                                    </div>
                                                    <div class="mt-4 d-flex align-items-center">
                                                        <i class="bi bi-key-fill me-2"></i>
                                                        <input type="password" name="password" id="password"
                                                            tabindex="2" class="form-control" placeholder="Password"
                                                            autocomplete="current-password" required>

                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            onclick="showPasswords()" id="showPassword"
                                                            style="border: 1px solid gray !important;">
                                                        <label class="form-check-label" for="showPassword"
                                                            id="showPasswordLabel"
                                                            style="transform: none !important; float: left;">
                                                            Show password
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sm-offset-3 mt-5">
                                                        <button type="submit" name="login-submit" id="login-submit"
                                                            tabindex="3" class="form-control btn btn-login"
                                                            value="LOGIN"> Login</button>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 pt-4 pb-4 mb-5">
                                                        <a href="javascript:void(0)" class="registerAccount link"
                                                            style="color: #BABABA; ">Register Account here</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="text-center mt-3">
                    <h3 class="text-center">User Account Form</h3>
                    <p class="text-center">Please complete the form below</p>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row">
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">PCN ID Number</label>
                                <input type="number" class="form-control" name="idnumber" id="idnumber" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" id="middleName" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="number" class="form-control" name="contactNumber" id="contactNumber"
                                    required>
                            </div>
                            <div class="col-md-6 mt-3">
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
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="Username"
                                    placeholder="Username" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" id="Password" class="form-control"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password"
                                    autocomplete="off" required>
                                <span onclick="showPasswordRegistration()">
                                    <img src="room/images/eye-solid.svg" alt="img" width="3%" id="eye-open">
                                    <img src="room/images/eye-slash-solid.svg" alt="img" width="3%" id="eye-close">
                                </span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="confirmpassword" id="ConfirmPassword" class="form-control"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password"
                                    autocomplete="off" required>
                                <span onclick="showConfirmPasswordRegistration()">
                                    <img src="room/images/eye-solid.svg" alt="img" width="3%" id="Coneye-open">
                                    <img src="room/images/eye-slash-solid.svg" alt="img" width="3%" id="Coneye-close">
                                </span>
                            </div>
                            <span id='message' style="margin-top: -2rem !important;"></span>
                            <script type="text/javascript" charset="utf-8">
                                $('#Password, #ConfirmPassword').on('keyup', function () {
                                    if ($('#Password').val() && $('#ConfirmPassword').val() == null) {
                                        $('');
                                    } else if ($('#Password').val() == $('#ConfirmPassword').val()) {
                                        $('#message').html('Password Matched').css('color', 'green');
                                    } else
                                        $('#message').html('Password Unmatched').css('color', 'red');
                                });
                            </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary button" name="register" id="register">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            // Account Registration
            $(document).ready(function () {
                $('.registerAccount').on('click', function () {
                    $('#registerAccount').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#job_id').val(data[0]);


                });
            });

            // Show password
            function showPasswords() {
                var showPassword = document.getElementById('password');

                if (showPassword.type === 'password') {
                    showPassword.type = 'text';
                } else {
                    showPassword.type = 'password';
                }
            }

            // Show password in registration page
            function showPasswordRegistration() {
                var password = document.getElementById("Password");
                var open = document.getElementById("eye-open");
                var close = document.getElementById("eye-close");

                if (password.type === 'password') {
                    password.type = "text";
                    open.style.display = "block";
                    close.style.display = "none";
                } else {
                    password.type = "password";
                    open.style.display = "none";
                    close.style.display = "block";
                }
            }

            // Show Confirm Password in Registration page
            function showConfirmPasswordRegistration() {
                var conpassword = document.getElementById("ConfirmPassword");
                var conopen = document.getElementById("Coneye-open");
                var conclose = document.getElementById("Coneye-close");

                if (conpassword.type === 'password') {
                    conpassword.type = "text";
                    conopen.style.display = "block";
                    conclose.style.display = "none";
                } else {
                    conpassword.type = "password";
                    conopen.style.display = "none";
                    conclose.style.display = "block";
                }
            }


            // Password Input Checker
            $(function () {
                var $password = $(".form-control[type='password']");
                var $passwordAlert = $(".password-alert");
                var $requirements = $(".requirements");
                var leng, bigLetter, smallLetter, num, specialChar;
                var $leng = $(".leng");
                var $bigLetter = $(".big-letter");
                var $smallLetter = $(".small-letter");
                var $num = $(".num");
                var numbers = "0123456789";
                var lowercaseLetters = "abcdefghijklmnopqrstuvwxyz";

                $requirements.addClass("wrong");
                $password.on("focus", function () {
                    $passwordAlert.show();
                });

                $password.on("input blur", function (e) {
                    var el = $(this);
                    var val = el.val();
                    $passwordAlert.show();

                    if (val.length < 8) {
                        leng = false;
                    } else {
                        leng = true;
                    }

                    if (val.toLowerCase() == val) {
                        bigLetter = false;
                    } else {
                        bigLetter = true;
                    }

                    smallLetter = false;
                    for (var i = 0; i < val.length; i++) {
                        for (var j = 0; j < lowercaseLetters.length; j++) {
                            if (val[i] == lowercaseLetters[j]) {
                                smallLetter = true;
                            }
                        }
                    }

                    num = false;
                    for (var i = 0; i < val.length; i++) {
                        for (var j = 0; j < numbers.length; j++) {
                            if (val[i] == numbers[j]) {
                                num = true;
                            }
                        }
                    }

                    if (leng == true && bigLetter == true && smallLetter == true && num == true) {
                        $(this).addClass("valid").removeClass("invalid");
                        $requirements.removeClass("wrong").addClass("good");
                        $passwordAlert.removeClass("alert-warning").addClass("alert-success");
                    } else {
                        $(this).addClass("invalid").removeClass("valid");
                        $passwordAlert.removeClass("alert-success").addClass("alert-warning");

                        if (leng == false) {
                            $leng.addClass("wrong").removeClass("good");
                        } else {
                            $leng.addClass("good").removeClass("wrong");
                        }

                        if (bigLetter == false) {
                            $bigLetter.addClass("wrong").removeClass("good");
                        } else {
                            $bigLetter.addClass("good").removeClass("wrong");
                        }

                        if (smallLetter == false) {
                            $smallLetter.addClass("wrong").removeClass("good");
                        } else {
                            $smallLetter.addClass("good").removeClass("wrong");
                        }

                        if (num == false) {
                            $num.addClass("wrong").removeClass("good");
                        } else {
                            $num.addClass("good").removeClass("wrong");
                        }
                    }

                    if (e.type == "blur") {
                        $passwordAlert.hide();
                    }
                });
            });
        </script>

</body>

</html>