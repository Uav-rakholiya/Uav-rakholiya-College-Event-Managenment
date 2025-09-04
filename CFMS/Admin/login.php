<?php
session_start();
include "connection.php";

if (isset($_SESSION['admin_loggedin'])) {
    header("location:index.php");
}

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $password = $_POST['password'];

    
    // Validate form data

    $query = "Select * from tbl_superadmin where email='$email' AND password='$password' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['admin_loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $password;

            header("location:index.php");
        }
    } else {
        echo '<div class="alert alert-danger">Email, password not matched</div>';
    }
}


?>

<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="light" data-menu-color="dark">


<!-- Mirrored from coderthemes.com/hyper/creative/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 17:02:39 GMT -->

<head>
    <meta charset="utf-8" />
    <title>ADMIN | CFMS | Login</title>
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
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->


                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your Credentials access admin panel.</p>
                            </div>

                            <form method="post">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->



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