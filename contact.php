<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>


    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Contact Us</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>/index.php">Home</a></span> <span>Contact</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Contact Information</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Website:</span> <a href="#">yoursite.com</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Your Name">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Your Email">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div>
      <iframe
        class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12091.16681192055!2d-73.98494479922532!3d40.74460869921903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259059d4cffcf%3A0x8b65d652921711b0!2sNew%20York%2C%20NY%2010016%2C%20USA!5e0!3m2!1sen!2s!4v1706523300679!5m2!1sen!2s"
        allowfullscreen="" loading="lazy" width="100%" height="400" style="border:0;"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<?php require "includes/footer.php"; ?>