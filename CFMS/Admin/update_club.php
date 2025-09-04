<?php
include("connection.php");
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
  header("location:login.php");
}
if (isset($_GET['id'])) {
  $id = base64_decode($_GET['id']);
  $select = "SELECT club_name,category,capacity,description from tbl_clubs WHERE club_id= '$id' ";
  $result = mysqli_query($conn, $select);
  $data = mysqli_fetch_assoc($result);
}



if (isset($_POST['btnsubmit'])) {
  $id = base64_decode($_GET['id']);
  $name = $_POST['name'];
  $category = $_POST['category'];
  $capacity = $_POST['capacity'];
  $description = $_POST['description'];

  $sql = "UPDATE tbl_clubs SET club_name='$name',category='$category',capacity='$capacity', description ='$description' WHERE club_id = '$id' ";

  if (mysqli_query($conn, $sql)) {
    header("location:view_clubs.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
  <meta charset="utf-8" />
  <title>ADMIN | CFMS | Update Club</title>
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
        <div class="container mt-2">
          <form method="post">
            <div class="row flex-between-center">
              <div class="col-md">
                <h5 class="mb-2 mb-md-0">Update Club</h5>
              </div>
              <div class="col-auto">
                <a href="view_clubs.php" class="btn btn-link text-secondary p-0 me-3 fw-medium">Back to View Clubs</a>
                <input type="submit" class="btn btn-primary" name="btnsubmit" role="button" value="Update Club">
              </div>
            </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
              <!-- <h6 class="mb-0">Basic information</h6> -->
            </div>
            <div class="card-body pt-0">

              <div class="row gx-2">
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="event_name">Enter Club Name</label>
                  <input type="text" class="form-control" name="name" value=" <?php echo $data['club_name']; ?> " required />
                </div>

                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="date">Category</label>
                  <input type="text" class="form-control" name="category" value=" <?php echo $data['category']; ?> ">
                </div>






              </div>

              <div class="row gx-2">
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="capacity">Capacity</label>
                  <input class="form-control" id="capacity" type="number" name="capacity" value="<?php echo $data['capacity']; ?>" required />
                </div>
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="description">Event Description</label>
                  <input class="form-control" id="description" name="description" type="text" value=" <?php echo $data['description']; ?> " required />
                </div>


              </div>

              </form>
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