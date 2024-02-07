<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

   // $msg = false;

	if (!isset($_SERVER['HTTP_REFERER'])) {

		header('location: http://localhost/coffee-blend');
		exit;
	}

	if(!isset($_SESSION['user_id'])){
	
		header("location: ".APPURL."");
	}

	if(isset($_POST['submit'])){

    	if(empty($_POST['review'])){
			echo "<script>alert('One or more input fields are empty!');</script>";
  }
  else{

	   		$review = $_POST["review"];
            $username = $_SESSION['username'];

			$writeReview = $conn->prepare("INSERT INTO reviews (review, username) VALUES (:review, :username)");

			$writeReview->execute([
				":review" => $review,
                ":username" => $username
			]);

            //$msg = true;
            //echo "<script>var msg = true;</script>";
            echo "<script>alert('Your review has been submitted!');</script>";
            header("refresh:0; url=" . APPURL . "/index.php");

     }
  }

?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Write a Review</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>/index.php">Home</a></span> <span>Review</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">

			<form action="write-review.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
					
				<h3 class="mb-5 billing-heading text-center">Give us your Thoughts</h3>
	          	
	          		
	            <div class="col-md-12">

	                <label>Write your review</label>
	                <textarea name="review" type="text" class="form-control" cols="12" rows="10"></textarea>
                </div>


                <div class="col-md-12">
                	<div class="form-group mt-4">
					<div class="radio">
                      <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Submit review</button>

						</div>
					</div>
                </div>
	            
	        </form>
          </div> 
          </div>
        </div>
      
    </section> <!-- .section -->

<?php require "../includes/footer.php"; ?>    