<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Journey Dims | Destinasi Wisata</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--
		<?php
	include "includes/config.php";

	

	$area = mysqli_query($connection, "SELECT * FROM fotodestinasi, destinasi WHERE fotodestinasi.destinasi_ID=destinasi.destinasi_ID ");
?>
		<?php include "FEmenu.php"; ?>

		<body>
			<!-- Start banner Area -->
					
			<!-- End banner Area -->
		
		<!-- About Generic Start -->
		<div class="container">
  
  <br><br>
  <div class="row">
    <div class="col-sm-12">


      <?php if(mysqli_num_rows($area) > 0) {
        while ($row5 = mysqli_fetch_array($area))
      { ?>
      <div class="media">
          <div class="media-body">
            <h4 class="mt-0 mb-3"><?php echo $row5["foto_nama"]?></h4>
            <!---<h5><?php echo $row5["destinasi_alamat"]?></h5>-->

            <p class="col-sm-10"><?php echo $row5["destinasi_alamat"]?></p>
          </div>
          <img class="mb-3" style="width: 200px; height: 100%;" src="images/<?php echo $row5["foto_file"]?>" alt="Gambar tidak ada">
        </div>
        <?php } } ?>
    </div>
  </div>
</div>

																											
					</div>
				</div>	
			
			<!-- End feature Area -->

			<!-- Start Generic Area -->
			
			<!-- End Generic Start -->		

			<!-- start footer Area -->		
				<?php include "FEfooter.php"; ?>
			<!-- End footer Area -->		

		</div>
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>