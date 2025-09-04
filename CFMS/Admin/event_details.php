<?php
session_start();
include "connection.php";
if (!isset($_SESSION['admin_loggedin'])) {
    header("location:login.php");
}
if(isset($_GET['name'])){
    
    $clubname=$_GET['name'];
    
}
if($_GET['id']){
    $eventid=base64_decode($_GET['id']);
    $sql="SELECT * FROM tbl_events WHERE event_id='$eventid'";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($result); 
    $club_id=$data['club_id'];
    $sql2="SELECT * FROM tbl_clubs WHERE club_id = '$club_id'";
    $result2=mysqli_query($conn,$sql2);
    $data2=mysqli_fetch_array($result2);

}



?>

<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
        <meta charset="utf-8" />
        <title>EVENT DETAILS | ADMIN</title>
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
                    <div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Events</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
            <h4 class="page-title">Details</h4>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-sm-12">
        <!-- Profile -->
        <div class="card bg-primary">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            
                            <div class="col">
                                <div>
                                    <h1 class="mt-1 mb-1 text-white"><?php echo $data['event_name']; ?></h1>
                                    <p class="font-13 text-white-50"> CLUB <?php echo $data2['club_name']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                     <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end card-body/ profile-user-box-->
        </div><!--end profile/ card -->
    </div> <!-- end col-->
</div>
<!-- end row -->


<div class="row">
    <div class="col-xl-4">
        <!-- Personal-Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Event Admin</h4>
                

                

                <div class="text-start">
                    <p class="text-muted"><strong>Full Name :</strong> <span class="ms-2"><?php echo $data['event_admin'] ?> </span></p>

                    
                    

                </div>
            </div>
        </div>
        <!-- Personal-Information -->

        

        <!-- end card-->

    </div> <!-- end col-->

    <div class="col-xl-8">

        
        <!-- End Chart-->

        <div class="row">
            <div class="col-sm-4">
                <div class="card tilebox-one">
                    <div class="card-body">
                        
                        <h6 class="text-muted text-uppercase mt-0">Total Entry</h6>
                        <h2 class="m-b-20"><?php echo $data['capacity']; ?></h2>
                        <span class="badge bg-primary"></span> <span class="text-muted"></span>
                    </div> <!-- end card-body-->
                </div> <!--end card-->
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card tilebox-one">
                    <div class="card-body">
                        
                        <h6 class="text-muted text-uppercase mt-0">No. Of Participants</h6>
                        <?php 
                            $event_id = $data['event_id'];
                            $query = "SELECT COUNT(*) as count FROM tbl_participants WHERE event_id='$event_id' and status = 1";
                            $result = mysqli_query($conn, $query);
                            $count = mysqli_fetch_assoc($result)['count'];
                        ?>
                        <h2 class="m-b-20"><?php echo $count; ?></h2>
                        
                    </div> <!-- end card-body-->
                </div> <!--end card-->
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card tilebox-one">
                    <div class="card-body">
                        
                        <h6 class="text-muted text-uppercase mt-0">No. Of Volunteers</h6>
                        <?php 
                            $event_id = $data['event_id'];
                            $query2 = "SELECT COUNT(*) as count FROM tbl_volunteer WHERE event_id='$event_id' and status = 1";
                            $result2 = mysqli_query($conn, $query2);
                            $count2 = mysqli_fetch_assoc($result2)['count'];
                        ?>
                        <h2 class="m-b-20"><?php echo $count2; ?></h2>
                       
                    </div> <!-- end card-body-->
                </div> <!--end card-->
            </div><!-- end col -->

        </div>
        <!-- end row -->


    <!-- <div class="row">
        <div class="col-xl-6">
            <button type="button" class="btn btn-primary w-50">Participate</button>
        </div>
        
    </div> -->
    </div>
    <!-- end col -->

</div>
        <!-- end row -->


    <!-- <div class="row">
        <div class="col-xl-6">
            <button type="button" class="btn btn-primary w-50">Participate</button>
        </div>
        
    </div> -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-12">
    <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Event Description</h4>
                

                <hr/>

                <div class="text-start">
                    <p><strong>Event Name : <span class="ms-2"><?php echo $data['event_name']; ?></span></strong></p>

                    <p><strong>Club : <span class="ms-2"><?php echo $data2['club_name']; ?></span></strong></p>

                    <p><strong>Event Date : <span class="ms-2"><?php echo $data['date']; ?></span></strong></p>

                    <p><strong>Event Time : <span class="ms-2"><?php echo date('H:i', strtotime($data['time'])); ?></span></strong></p>

                    <p><strong>Event Capacity : <span class="ms-2"><?php echo $data['capacity']; ?></span></strong></p>

                    <p><strong>Event Description : <span class="ms-2"><?php echo $data['description']; ?></span></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
   <center> 
   <form method="post" >
            <a href="view_participants.php?id=<?php echo base64_encode($data['event_id']); ?>" class="btn btn-primary">View Participants</a>
        </form>
    <center>
    
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