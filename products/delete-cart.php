<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    if (!isset($_SERVER['HTTP_REFERER'])) {

        header('location: http://localhost/coffee-blend');
     exit;
    }

    if(!isset($_SESSION['user_id'])){

        header("location: ".APPURL."");
    }

    $deleteAll = $conn->query("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
    $deleteAll->execute();

    header("Location: cart.php");

?>