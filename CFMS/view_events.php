<?php
session_start();
include "connection.php";
if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
}
if ($_GET['id']) {
    $club_id = base64_decode($_GET['id']);
    $clubname = base64_decode($_GET['name']);
    $sql = "SELECT * FROM tbl_events WHERE club_id='$club_id' AND status=1";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
    <meta charset="utf-8" />
    <title>CFMS | Club Events</title>
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

                <div class="container pt-5">
                    <h1 class="text-center mb-4">Club <?php echo $clubname; ?> Events</h1>
                    <div class="row">
                        <?php
                        while ($data = mysqli_fetch_array($result)) {


                        ?>
                            <?php if (date('Y-m-d') <= $data['date']) { ?>
                                <div class="col-xl-4 col-md-6 col-sm-12">

                                    <center>

                                        <div class="card" style="width: 100%;">
                                            <div class="card-body">
                                                <h3 class="card-title">Event Name : <?php echo $data['event_name']; ?></h3>
                                                <p class="card-text">Date: <?php echo $data['date']; ?></p>
                                                <p class="card-text">Time: <?php echo date('H:i', strtotime($data['time'])); ?></p>
                                                <a href="event_details.php?id=<?php echo base64_encode($data['event_id']); ?>&name=<?php echo base64_encode($clubname); ?>" class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>

                                    </center>
                                </div>
                            <?php } ?>
                        <?php } ?>




                    </div>
                </div>
                <!-- container -->

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