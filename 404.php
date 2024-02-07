<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

    if(!isset($_SESSION['user_id'])){
        header("location: " . APPURL . "/index.php");
    }

?>


<section class="home-slider owl-carousel">

<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">404 | Page not found!</h1>
          <a href="<?php echo APPURL; ?>/index.php" class="btn btn-dark py-3 px-4">Go Home</a>
      </div>

    </div>
  </div>
</div>
</section>

<?php require "includes/footer.php"; ?>