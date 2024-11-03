<?php
  include "includes/config.php";

  $query = mysqli_query($connection, "  SELECT * from area");

  $destinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi 
    WHERE kategori.kategori_ID = destinasi.kategori_ID
    AND destinasi.destinasi_ID = fotodestinasi.destinasi_ID");

  $sql = mysqli_query($connection, "SELECT * FROM destinasi ");
  $jumlah = mysqli_num_rows ($sql);

  $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi ");

  $foto1 = mysqli_query($connection, "SELECT * FROM kategori ");

  $kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten ");

  //  $kuliner = mysqli_query($connection, "SELECT * FROM kuliner ");

  $hotel = mysqli_query($connection, "SELECT * FROM hotel,area,kabupaten 
  WHERE hotel.area_ID=area.area_ID AND area.kabupaten_KODE=kabupaten.kabupaten_KODE");

?>

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

<menu>
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
      <div class="container">
        <a class="navbar-brand" href="FEhome.php">Journey<sup>dims</sup></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="FEdestipag.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Destinasi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(mysqli_num_rows($sql) > 0) {
                  while ($row = mysqli_fetch_array($sql))
                {?>
                <a class="dropdown-item" href="FEdestipag.php"><?php echo $row["destinasi_nama"]?></a>
                <?php } }?>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="FEarea.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Area
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(mysqli_num_rows($sql) > 0) {
                  while ($row = mysqli_fetch_array($sql))
                
                {?>
                <a class="dropdown-item" href="FEarea.php"><?php echo $row["area_nama"]?></a>
                <?php } }?>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="FEhotel.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penginapan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(mysqli_num_rows($sql) > 0) {
                  while ($row = mysqli_fetch_array($sql))
                
                {?>
                <a class="dropdown-item" href="FEhotel.php"><?php echo $row["area_nama"]?></a>
                <?php } }?>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="FEberita.php">Berita</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="dimas.php">Negara</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
</menu>