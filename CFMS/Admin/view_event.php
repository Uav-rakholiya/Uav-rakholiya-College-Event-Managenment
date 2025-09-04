<?php
include("connection.php");
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header("location:login.php");
}
$sql = "SELECT * FROM tbl_events";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
    <meta charset="utf-8" />
    <title>ADMIN | CFMS | View Events</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        a {
            color: black;
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

                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h1>EVENTS LIST</h1>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="add_event.php" style="text-decoration:none; "> <button class="btn btn-outline-dark" style="margin-top:0px; margin-left:80%;">ADD</button></a>
                        </div>


                        <div class="container mt-3">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-hover table-centered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAME</th>
                                                    <th>CLUB ID</th>
                                                    <th>EVENT ADMIN</th>
                                                    <th>DATE</th>
                                                    <th>TIME</th>
                                                    <th>CAPACITY</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <td><?php echo $data['event_id']; ?></td>
                                                        <td><?php echo $data['event_name']; ?></td>
                                                        <td><?php echo $data['club_id']; ?></td>
                                                        <td><?php echo $data['event_admin']; ?></td>
                                                        <td><?php echo $data['date']; ?></td>
                                                        <td><?php echo date('H:i', strtotime($data['time'])) ?></td>
                                                        <td><?php echo $data['capacity']; ?></td>
                                                        <td><?php echo $data['description']; ?></td>
                                                        <td><?php echo ($data['status'] == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Completed</span>'; ?></td>

                                                        <td>
                                                            <a href="event_details.php?id=<?php echo base64_encode($data['event_id']); ?>" style="text-decoration:none;"><i class="fa fa-eye" aria-hidden="true" style="font-size:15px;"></i></a>
                                                            <a href="update_event.php?id=<?php echo base64_encode($data['event_id']); ?>" style="text-decoration:none;"><i class="fa fa-pencil" aria-hidden="true" style="font-size:15px;"></i></a>
                                                            <?php if ($data['status'] == 1): ?>
                                                                <a href="delete_event.php?id=<?php echo $data['event_id']; ?>" style="text-decoration:none;"><i class="fa fa-check" aria-hidden="true" style="font-size:15px;"></i></a>
                                                            <?php else: ?>
                                                                <a href="delete_event.php?id=<?php echo $data['event_id']; ?>" style="text-decoration:none;"><i class="fa fa-times" aria-hidden="true" style="font-size:15px;"></i></a>
                                                            <?php endif; ?>


                                                        </td>
                                                </tr>
                                            <?php
                                                    }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

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