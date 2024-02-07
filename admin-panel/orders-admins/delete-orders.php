<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

    if(!isset($_SESSION['admin_name'])){
        header("location: ".ADMINURL."/admins/login-admins.php");
    }

    $id = $_GET['id'];
    
    $deleteOrder = $conn->query("DELETE FROM orders WHERE id = '$id'");
    $deleteOrder->execute();
    
    if($deleteOrder){
        echo "<script>alert('Order has been deleted successfully!')</script>";
        echo "<script>window.location.href = 'show-orders.php'</script>";
    }
    else{
        echo "<script>alert('Order has not been deleted!')</script>";
    }
    
?>