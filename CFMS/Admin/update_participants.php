<?php
include "connection.php";
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
  header("location:login.php");
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = "SELECT * from tbl_participants WHERE participant_id= '$id' ";
  $result = mysqli_query($conn, $select);
  $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['btnsubmit'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $user_id = $_POST['user_id'];
  $event_id = $_POST['event_id'];
  $reg_date = $_POST['reg_date'];

  $sql = "UPDATE tbl_participants SET name='$name',user_id='$user_id',event_id='$event_id', reg_date ='$reg_date' WHERE participant_id = '$id' ";

  if (mysqli_query($conn, $sql)) {
    header("location:view_all_participants.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
  <meta charset="utf-8" />
  <title>ADMIN | CFMS | Update Participants</title>
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
                <!-- <h5 class="mb-2 mb-md-0">Create Club</h5> -->
              </div>
              <div class="col-auto">
                <input type="reset" class="btn btn-link text-secondary p-0 me-3 fw-medium" value="Discard">
                <input type="submit" class="btn btn-primary" name="btnsubmit" role="button" value="Update Participant">
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 pe-lg-2">
          <div class="card mt-2">
            <div class="card-header bg-body-tertiary">
              <!-- <h6 class="mb-0">Basic information</h6> -->
            </div>
            <div class="card-body pt-0">

              <div class="row gx-2">
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="name">Enter Volunteer Name</label>
                  <input type="text" class="form-control" name="name" value=" <?php echo $data['name']; ?> " required />
                </div>

                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="date">User Id</label>
                  <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    <?php
                    $query = "SELECT user_id, name FROM tbl_user";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['user_id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row gx-2">
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="capacity">Event Id</label>
                  <select class="form-control" id="event_id" name="event_id" required>
                    <option value="">Select Event</option>
                    <?php
                    $query = "SELECT event_id, event_name FROM tbl_events";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['event_id'] . "'>" . $row['event_name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6 col-sm-12 mb-2">
                  <label class="form-label" for="description">Registration Date</label>
                  <input class="form-control" id="description" name="reg_date" type="date" required />
                </div>


              </div>

              </form>
            </div>
            <!-- container -->

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