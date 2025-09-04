<?php 
    include("connection.php");
    if (!isset($_SESSION['admin_loggedin'])) {
        header("location:login.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
    // Get the current status of the event
    $status_query = "SELECT status FROM tbl_events WHERE event_id = '$id'";
    $status_result = mysqli_query($conn, $status_query);
    $status_row = mysqli_fetch_assoc($status_result);
    $current_status = $status_row['status'];

    // Toggle the status
    $new_status = ($current_status == 1) ? 0 : 1;

    // Update the status in the database
    $update_sql = "UPDATE tbl_events SET status = $new_status WHERE event_id = '$id'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        header("location:view_event.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>