<!doctype html>

<?php 

include "includes/config.php";

$query = mysqli_query($connection, "SELECT * FROM area");

$destinasi = mysqli_query($connection, " SELECT * FROM kategori, destinasi, fotodestinasi 
WHERE kategori.kategori_ID = destinasi.kategori_ID 
AND destinasi.destinasi_ID = fotodestinasi.destinasi_ID ");

$sql = mysqli_query($connection, " SELECT * FROM destinasi ");

$jumlah = mysqli_num_rows($sql);

$foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>WISATA</title>
  </head>
  <body>
    
    <!-- AWAL MENU -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Area
            </a>
            <div class="dropdown-menu">
              <?php if(mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query))
                { ?>
                <a class="dropdown-item" href=""><?php echo $row["area_nama"] ?></a>
              <?php } } ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- AKHIR MENU -->

    <!-- AWAL SLIDER -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/1.jpg" class="d-block w-100" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Wallpaper Motion 3D</h1>
            <p>Sebuah Wallpaper Elegan dan Dinamis</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/2.JPG" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Wallpaper Desktop Motion 3D</h1>
            <p>Sebuah Wallpaper Dinamis dan Bagus</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/3.jpg" class="d-block w-100" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Wallpaper Desktop W11</h1>
            <p>Sebuah Wallpaper Berupa Bunga Berwarna Biru</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>

    <!-- AKHIR SLIDER -->

    <!-- Awal Tampilan Objek -->

    <div class="container mt-4">
      <div class="row">
        <div class="col-sm-8">
          <?php if(mysqli_num_rows($destinasi) > 0) {
            while ($row2 = mysqli_fetch_array($destinasi))
            { ?>
          <div class="media">
            <div class="media-body">
              <h4 class="mt-2 mb-2"><?php echo $row2["destinasi_nama"]; ?></h4>
              <h5><?php echo $row2["destinasi_alamat"]; ?></h5>
              <p><?php echo $row2["kategori_keterangan"]; ?></p>
            </div>
            <img  class="ml-3" style="width: 150px; height: 100%;" src="images/<?php echo $row2["foto_file"]; ?>" alt="Gambar Tidak Ada">
          </div>
          <?php } } ?>
        </div>
        
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Jumlah Objek Wisata
              <span class="badge badge-primary badge-pill"><?php echo $jumlah; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              A second list item
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              A third list item
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Akhir Tampilan Objek -->

    <!-- GALERI -->


    <!-- END GALERI -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
  <?php include "footer.php"; ?>
</html>