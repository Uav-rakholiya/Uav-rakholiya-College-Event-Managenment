<?php
include("connection.php");
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
  header("location:login.php");
}


if (isset($_GET['id'])) {
  $id = base64_decode($_GET['id']);
  $select = "SELECT * FROM tbl_events WHERE event_id= '$id' ";
  $result = mysqli_query($conn, $select);
}

if (isset($_POST['btnsubmit'])) {
  $id = base64_decode($_GET['id']);
  $name = $_POST['name'];
  $club_id = $_POST['club_id'];
  $event_admin = $_POST['event_admin'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $capacity = $_POST['capacity'];
  $description = $_POST['description'];

  $sql = "UPDATE tbl_events SET event_name='$name',club_id='$club_id',event_admin='$event_admin',date='$date', time='$time',capacity='$capacity', description ='$description' WHERE event_id = '$id' ";

  if (mysqli_query($conn, $sql)) {
    header("location:view_event.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en" data-sidenav-size="fullscreen">

<head>
  <meta charset="utf-8" />
  <title>ADMIN | CFMS | Update Event</title>
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
                <h5 class="mb-2 mb-md-0">Event Proposal</h5>
              </div>
              <div class="col-auto">
                <input type="reset" class="btn btn-link text-secondary p-0 me-3 fw-medium" value="Discard">
                <input type="submit" class="btn btn-primary" name="btnsubmit" value="Update Event">
              </div>
            </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
              <h6 class="mb-0">Basic information</h6>
            </div>
            <div class="card-body pt-0">
              <?php while ($data = mysqli_fetch_array($result)) { ?>
                <div class="row gx-2">
                  <div class="col-md-4 col-sm-12 mb-2">
                    <label class="form-label" for="event_name">Event Name</label>
                    <input class="form-control" id="name" name="name" type="text" value="<?php echo $data['event_name']; ?>" required />
                  </div>

                  <div class="col-md-2 col-sm-12 mb-2">
                    <label class="form-label" for="date">Date</label>
                    <input class="form-control" name="date" id="date" type="date" value="<?php echo $data['date']; ?>" required />
                  </div>
                  <div class="col-md-2 col-sm-12 mb-2">
                    <label class="form-label" for="time">Time</label>
                    <input class="form-control" id="time" type="time" name="time" value="<?php echo date('H:i', strtotime($data['time'])); ?>" required />
                  </div>


                  <div class="col-md-4 col-sm-12 ">
                    <label class="form-label" for="time">Club Name</label>
                    <select class="form-control" name="club_id">
                      <option value="">Select Club</option>
                      <?php
                      $select2 = "SELECT * from tbl_clubs WHERE status=1 ";
                      $result2 = mysqli_query($conn, $select2);
                      while ($data2 = mysqli_fetch_assoc($result2)) {
                        echo "<option value='" . $data2['club_id'] . "'>" . $data2['club_name'] . "</option>";
                      }
                      ?>

                    </select>
                  </div>



                </div>

                <div class="row gx-2">
                  <div class="col-md-4 col-sm-12 mb-2">
                    <label class="form-label" for="capacity">Total Number of Participants</label>
                    <input class="form-control" name="capacity" type="number" value="<?php echo $data['capacity']; ?>" required />
                  </div>
                  <div class="col-md-4 col-sm-12 mb-2">
                    <label class="form-label" for="description">Event Description</label>
                    <input type="text" class="form-control" placeholder="DESCRIPTION OF A CLUB" value="<?php echo $data['description']; ?>" name="description">
                  </div>
                  <div class="col-md-4 col-sm-12 mb-2">
                    <label class="form-label" for="name">Organizer Name</label>
                    <select class="form-control" name="event_admin" value="<?php echo $data['event_admin']; ?>">
                      <option value="<?php echo $data['event_admin']; ?>" disabled selected><?php echo $data['event_admin']; ?></option>

                      <?php
                      $sql = "SELECT * FROM tbl_superadmin WHERE status=1";
                      $res = mysqli_query($conn, $sql);
                      while ($dat = mysqli_fetch_assoc($res)) {
                        echo "<option value='" . $dat['name'] . "'>" . $dat['name'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>

                </div>
              <?php } ?>

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