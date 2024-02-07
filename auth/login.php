<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if(isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

  if(isset($_POST['submit'])){

    if(empty($_POST['email']) OR empty($_POST['password'])){
      echo "<script>alert('One or more input fields are empty!');</script>";
  }

  else{

    $email = $_POST['email'];
    $password = $_POST['password'];

    //write query to select user by email and password

    $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() > 0){

      if(password_verify($password, $fetch['password'])){

        $_SESSION['user_id'] = $fetch['id'];
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['email'] = $fetch['email'];

        header("location: ".APPURL."");

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

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Login</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Login</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form action="login.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
				<h3 class="mb-4 billing-heading">Login</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="Email">Email</label>
	                  <input type="text" name="email" class="form-control" placeholder="Email">
	                </div>
	              </div>
                 
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="Password">Password</label>
	                    <input type="password" name="password" class="form-control" placeholder="Password">
	                </div>

                </div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
							<div class="radio">
                      <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Login</button>
						    </div>
					</div>
                </div>

               
	          </form><!-- END -->
          </div> <!-- .col-md-8 -->
          </div>
        </div>
      </div>
    </section> <!-- .section -->

    <?php require "../includes/footer.php"; ?>