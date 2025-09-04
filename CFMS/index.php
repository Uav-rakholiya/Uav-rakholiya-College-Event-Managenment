<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
    <meta charset="utf-8" />
    <title>CFMS | Dashboard</title>
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
                <section class="hero-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="mt-md-4">


                                    <h2 class="text-white fw-normal mb-4  hero-title">
                                        <span class="text-white-50 ms-1">Welcome to the</span>
                                        INFERNO
                                    </h2>

                                    <p class="mb-4 font-16 text-white-50">"The hottest college event of the year is here. Get ready to ignite your passion! Join us for an unforgettable experience that will leave you feeling energized and inspired."</p>
                                    <p class="mb-4 font-16 text-white-50"></p>


                                </div>
                            </div>
                            <div class="col-md-5 offset-md-2">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <img src="assets/images/logo-removebg.png" alt="" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-5">
                    <div class="container">
                        <div class="row py-4">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                                    <h3><span class="text-primary">Inferno</span> Event Details</h3>
                                    <p class="text-muted mt-2">Join us for the hottest college event of the year, Inferno, where you'll experience an unforgettable night of music, dance, and excitement.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="mdi mdi-calendar text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">Biggest Event of Colleges</h4>
                                    <p class="text-muted mt-2 mb-0">Experience the most anticipated event of the year, Inferno, where passion meets excitement.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="uil-vector-square-alt text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">Event Central</h4>
                                    <p class="text-muted mt-2 mb-0">Our event management platform streamlines planning and execution for all campus activities. From club meetings to major festivals, we've got you covered.

                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="uil uil-presentation text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">User-Friendly Interface
                                    </h4>
                                    <p class="text-muted mt-2 mb-0">Navigate our intuitive system with ease. Designed for students and staff alike, our platform makes event management accessible to everyone.

                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="uil uil-apps text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">Customizable Branding
                                    </h4>
                                    <p class="text-muted mt-2 mb-0">Make your events stand out with personalized graphics, tickets, and promotional materials. Our built-in design tools help showcase your creativity.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="uil  uil-th text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">All-in-One Solution</h4>
                                    <p class="text-muted mt-2 mb-0">Handle every aspect of event planning in one place - from budgeting to volunteer coordination, and attendee management to post-event surveys.

                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="text-center p-2 p-sm-3">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title bg-primary-lighten rounded-circle">
                                            <i class="uil uil-expand-alt text-primary font-24"></i>
                                        </span>
                                    </div>
                                    <h4 class="mt-3">Flexible Event Spaces
                                    </h4>
                                    <p class="text-muted mt-2 mb-0">Whether you're organizing a small study group or a campus-wide concert, our system adapts to events of all sizes and types with customizable layouts.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
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