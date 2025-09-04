<?php 
    include("connection.php");
    if (!isset($_SESSION['admin_loggedin'])) {
        header("location:login.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql= "UPDATE tbl_participants SET status = 0 WHERE participant_id = '$id' ";
        $result= mysqli_query($conn,$sql);

        if (mysqli_query($conn,$sql)){
            header("location:view_all_participants.php");
        }
    }
?>