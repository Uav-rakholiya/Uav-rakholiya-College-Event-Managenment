<?php
include "connection.php";
if (isset($_SESSION['loggedin'])) {
    header("location:index.php");
}
if (isset($_POST['submit'])) {
    $id = rand(111, 999);
    $user_id = "USR-" . $id;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $stream = mysqli_real_escape_string($conn, $_POST['stream']);
    $clgname = mysqli_real_escape_string($conn, $_POST['clgname']);
    $password = sha1(md5($_POST['password']));
    $confirm_password = sha1(md5($_POST['conf_pass']));

    // Validate form data
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Please fill in all the fields.";
    } elseif ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        $sql = "INSERT INTO tbl_user (user_id, name, email, mobile, dob, gender, clgname, stream, clg_year, password) VALUES ('$user_id','$name', '$email','$mobile','$dob','$gender','$clgname','$stream','$year','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="dark" data-menu-color="light">


<!-- Mirrored from coderthemes.com/hyper/creative/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 17:02:39 GMT -->

<head>
    <meta charset="utf-8" />
    <title>CFMS | Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-8">
                    <div class="card">

                        <!-- Logo -->


                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign Up</h4>
                                <p class="text-muted mb-4">Enter your Credentials.</p>
                            </div>

                            <form method="post">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" required placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="male">MALE</option>
                                                <option value="female">FEMALE</option>
                                                <option value="others">OTHERS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input class="form-control" type="number" name="mobile" required placeholder="Mobile Number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Year</label>
                                            <select class="form-control" name="year" required>
                                                <option selected require>Select Year</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="stream" class="form-label">Stream</label>
                                            <select class="form-control" name="stream" required>
                                                <option disabled selected>Select Stream</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BCOM">BCOM</option>
                                                <option value="BBA">BBA</option>
                                                <option value="MCA">MCA</option>
                                                <option value="MCOM">MCOM</option>
                                                <option value="MBA">MBA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="clgname" class="form-label">College Name</label>
                                            <input class="form-control" type="text" name="clgname" required placeholder="Enter College Name">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="conf_pass" class="form-label">Confirm Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" name="conf_pass" class="form-control" placeholder="Confirm your Password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 mb-0 text-center">
                                        <input class="btn btn-primary" name="submit" type="submit">
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">already have an account? <a href="login.php" class="text-muted ms-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <?php include "footer.php"; ?>
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/creative/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 17:02:39 GMT -->

</html>