
<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

if(isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."");
}

  if(isset($_POST['submit'])){

    if(empty($_POST['email']) OR empty($_POST['password'])){
      echo "<script>alert('One or more input fields are empty!');</script>";
  }

  else{

    $email = $_POST['email'];
    $password = $_POST['password'];

    //write query to select user by email and password

    $login = $conn->query("SELECT * FROM admins WHERE email = '$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() > 0){

      if(password_verify($password, $fetch['password'])){

        $_SESSION['admin_name'] = $fetch['admin_name'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['admin_id'] = $fetch['id'];

        header("location: ".ADMINURL."");

      }

      else{
        echo "<script>alert('Incorrect email or password!');</script>";
      }

    }
    else{
       echo "<script>alert('Incorrect email or password!');</script>";
     }
    }
  }

?>

      <div class="row" style="margin-top: 90px; margin-left: 250px; width: 450px">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h3 class="mt-3 mb-4 text-center">Login</h3>

              <form method="POST" class="p-auto" action="login-admins.php">

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                </form>

            </div>
       </div>
     </div>
    </div>



<?php require "../layouts/footer.php" ?>