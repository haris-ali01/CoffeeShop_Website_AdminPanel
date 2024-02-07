<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

    if(!isset($_SESSION['admin_name'])){
        header("location: ".ADMINURL."/admins/login-admins.php");
    }

    $id = $_GET['id'];
    
    $deleteBooking = $conn->query("DELETE FROM bookings WHERE id = '$id'");
    $deleteBooking->execute();
    
    if($deleteBooking){
        echo "<script>alert('Booking has been deleted successfully!')</script>";
        echo "<script>window.location.href = 'show-bookings.php'</script>";
    }
    else{
        echo "<script>alert('Booking has not been deleted!')</script>";
    }
    
?>