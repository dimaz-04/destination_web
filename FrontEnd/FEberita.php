			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

			<title>Journey Dims | Travel</title>

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

			<?php include "FEmenu.php"; ?>

			<?php
			 include "includes/config.php";
			 
			 $berita = mysqli_query($connection, "select * from berita"); ?>
			 
				<div class="main-wrapper">
					<br>
					<br>
					<br>
					<br>
					<!-- Start feature Area -->
					<section class="feature-area section-gap" id="secvice">
						<?php if(mysqli_num_rows($berita) > 0) {
						while ($row3=mysqli_fetch_array($berita))
					{ ?>
						<div class="container">
							<div class="row d-flex justify-content-center">
								<div class="menu-content pb-60 col-lg-8">
									<div class="title text-left">
										<h2 class="mb-10"><?php echo $row3["berita_judul"]?></h2>
										<p><?php echo $row3["berita_inti"]?></p>
										<h5><?php echo $row3["penulis"]?></h5>
										<br>
									</div>
								</div>
							</div>											
						</div>	
						<?php } } ?>																				
					</section>		
				</div>
		<?php include "FEfooter.php"; ?>