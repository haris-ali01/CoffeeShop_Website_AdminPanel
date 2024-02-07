<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

$success = false;


 
if(isset($_POST['submit'])){

    if(empty($_POST['first_name']) OR empty($_POST['last_name']) OR empty($_POST['date']) OR empty($_POST['time']) OR empty($_POST['phone']) OR empty($_POST['message'])){
      echo "<script>alert('One or more input fields are empty!');</script>";
      echo "<script>window.location.href = '" . APPURL . "';</script>";
  }

  else{

    if (isset($_SESSION['user_id'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    //checking current date with booking date
    $currentDate = new DateTime();
    $selectedDate = DateTime::createFromFormat('m/d/Y', $date);

    if($selectedDate > $currentDate) {

        $insert = $conn->prepare("INSERT INTO bookings (first_name, last_name, date, time, phone, message, user_id) VALUES (:first_name, :last_name, :date, :time, :phone, :message, :user_id)");
    
        $insert->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":date" => $date,
            ":time" => $time,
            ":phone" => $phone,
            ":message" => $message,
            ":user_id" => $user_id
        ]);

        $success = true;
        echo "<script>var success = true;</script>";
        echo "<script>window.location.href = '" . APPURL . "';</script>";
        header("Location: " . APPURL . "?success=" . ($success ? 'true' : 'false'));

    }
    else{
      
        echo "<script>alert('Choose a valid Date! It should be in the future!');";
        echo "window.location.href = '" . APPURL . "?success=" . ($success ? 'true' : 'false') . "';</script>";
    }
  }
  else{
      echo "<script>window.location.href = '" . APPURL . "/auth/login.php';</script>";
  }
  }
}
