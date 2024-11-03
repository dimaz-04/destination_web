	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Ahmad Sugandi</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<?php
	include "includes/config.php";

	

	$ahmad = mysqli_query($connection, "SELECT * FROM ahmadsugandi,destinasi,area,kabupaten,fotodestinasi 
	WHERE ahmadsugandi.destinasiID=destinasi.destinasiID and destinasi.areaID= area.areaID and area.kabupatenKODE=kabupaten.kabupatenKODE and fotodestinasi.destinasiID=destinasi.destinasiID ");
?>
		<?php include "menu.php"; ?>

		<body>
			<!-- Start banner Area -->
					
			<!-- End banner Area -->
		
		<!-- About Generic Start -->
		<div class="container">
  
  <br><br>
  <div class="row">
    <div class="col-sm-12">


      <?php if(mysqli_num_rows($ahmad) > 0) {
        while ($row8 = mysqli_fetch_array($ahmad))
      { ?>
      <div class="media">
          <div class="media-body">
            <h3 class="mt-0 mb-3"><?php echo $row8["destinasinama"]?></h4>
            <h4 class="col-sm-10"><?php echo $row8["kabupatenNAMA"]?></h5>
            	<br>
            	
            <p class="col-sm-10"><?php echo $row8["kabupatenKET"]?></p>
          </div>
          <img class="mb-3" style="width: 200px; height: 100%;" src="images/<?php echo $row8["fotofile"]?>" alt="Gambar tidak ada">
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
				<?php include "footer.php"; ?>
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