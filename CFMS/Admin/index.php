<?php
include "connection.php";
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .i {
            font-size: 550%;
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <?php include "topbar.php"; ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include "sidebar.php"; ?>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-start">
                                        <h2 class="text-muted">Hello!! <?php echo $_SESSION['name']; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">

                    <div class="row">
                        <div class="col-md-4">
                            <a href="view_clubs.php">
                                <div class="card mb-0 mt-3 text-white bg-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-building i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Total Clubs</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_clubs where status =1";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_events = $row['count'];
                                                    echo "<h2>" . $total_events . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="view_event.php">
                                <div class="card mb-0 mt-3 bg-secondary text-white">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-calendar-alt i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Total Events</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_events";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_events = $row['count'];
                                                    echo "<h2>" . $total_events . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </a>
                        </div> <!-- end col-->

                        <div class="col-md-4">
                            
                                <div class="card mb-0 mt-3 text-white bg-success">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-calendar-alt i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Active Events</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_events WHERE status=1 ";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_events = $row['count'];
                                                    echo "<h2>" . $total_events . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-4">
                                <div class="card mt-3 text-white bg-info text-xs-center">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-users-alt i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Total Users</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_user where status = 1";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_users = $row['count'];
                                                    echo "<h2>" . $total_users . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-4">
                            <a href="view_volunteer.php">
                                <div class="card mb-0 mt-3 text-white bg-warning text-xs-center">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-users-alt i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Total volunteers</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_volunteer where status = 1";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_events = $row['count'];
                                                    echo "<h2>" . $total_events . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </a>
                        </div> <!-- end col-->

                        <div class="col-md-4">
                            <a href="view_all_participants.php">
                                <div class="card mb-0 mt-3 text-white bg-danger text-xs-center">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <i class="uil-users-alt i"></i>
                                                    </blockquote>
                                                </center>
                                            </div>
                                            <div class="col-md-8">
                                                <center>
                                                    <h3>Total Participants</h3>
                                                    <?php
                                                    $query = "SELECT COUNT(*) as count FROM tbl_participants where status = 1";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $total_events = $row['count'];
                                                    echo "<h2>" . $total_events . "</h2>";
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </a>
                        </div> <!-- end col-->
                    </div><!-- end row-->
                </div>

                <!-- content -->








                <!-- Footer Start -->
                <?php include "footer.php"; ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <?php include "themeset.php"; ?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Daterangepicker js -->
        <script src="assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

        <!-- Apex Charts js -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

        <!-- Vector Map js -->
        <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

        <!-- Dashboard App js -->
        <script src="assets/js/pages/demo.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/creative/layouts-fullscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 17:03:49 GMT -->

</html>