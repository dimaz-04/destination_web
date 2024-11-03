<!DOCTYPE html>

<?php

ob_start();
session_start();
if(!isset($_SESSION['emailuser'])) {
  header("location:login.php");
}

?>

<?php 
  include "includes/config.php";
?>

<?php

include "includes/config.php";

if(isset($_POST['Simpan'])) {

  if(isset($_REQUEST['input_kode']))
  {
    $hotelkode = $_REQUEST['input_kode'];
  }

  if(!empty($hotelkode))
  {
    $hotelkode = $_REQUEST['input_kode'];
  }
  else {
    ?> <h1>Anda Harus Mengisi Data Dahulu !!</h1> <?php
    die ("Anda Harus Memasukan Datanya");
  }

  $hotelkode = $_POST['input_kode'];
  $hotelnama = $_POST['input_nama'];
  $hotelalamat = $_POST['input_alamat'];
  $hotelket = $_POST['input_ket'];
  $areahotel = $_POST['kode_area'];

  $nama = $_FILES['file']['name'];
  $file_tmp = $_FILES["file"]["tmp_name"];

  $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

  //PERIKSA EKSTEN FILE HARUS JPG ATAU PNG
  if(($ekstensifile == "jpg") or ($ekstensifile == "JPG")) 
  {
    move_uploaded_file($file_tmp, "images/".$nama); //unggah ke folder images
    mysqli_query($connection, "INSERT INTO hotel VALUES ('$hotelkode', '$hotelnama', '$hotelalamat', '$hotelket', '$nama', '$areahotel')");
    header("location:hotel.php");
  }
}

$datakabupaten = mysqli_query($connection, "select * from kabupaten");
$dataarea = mysqli_query($connection, "select * from area");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Penginapan | Dimas</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php include "header.php"; ?>

<div class="container-fluid">
<div class="card shadow mb-4">

  <div class="row">
    <div class="col-sm-1">
    </div>

    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Input Nama Hotel</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3 row">
          <label for="kode_kategori" class="col-sm-2 col-form-label">Kode Hotel</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_kategori" name="input_kode" placeholder="Kode Hotel" maxlength="4">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Hotel</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_kategori" name="input_nama" placeholder="Nama Hotel">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="keterangan_kategori" class="col-sm-2 col-form-label">Alamat Hotel</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="keterangan_kategori" name="input_alamat" placeholder="Alamat Hotel">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Keterangan Hotel</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="referensi_kategori" name="input_ket" placeholder="Keterangan Hotel">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="file" class="col-sm-2 col-form-label">Foto Hotel</label>
            <div class="col-sm-10">
              <input type="file" id="file" name="file">
              <p class="help-block">Field ini digunakan untuk Unggah file</p>
            </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Area Hotel</label>
          <div class="col-sm-10">
            <select class="form-control" id="kode_area" name="kode_area">
                <?php while ($row = mysqli_fetch_array($dataarea))
                { ?>
                  <option value="<?php echo $row["area_ID"]; ?>">
                    <?php echo $row["area_ID"]; ?>
                    <?php echo $row["area_nama"]; ?>
                  </option>
          <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-2 ">
          </div>
          <div class="col-sm-10">
            <input type="submit" class="btn btn-warning" value="Simpan" name="Simpan">
            <input type="reset" class="btn btn-info" value="Batal" name="Batal">
          </div>
        </div>
      </form>
    </div>
    

    
    <div class="col-sm-1">
    </div>
  </div>

  <br>
  <br>
  
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Daftar Nama Hotel</h1>
          <h2>Hasil Entri Data Pada Tabel Hotel</h2>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>
      <br>

      <form method="POST">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Nama Hotel</label>
          <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Hotel" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-success" value="Search">
        </div>  
      </form>
      
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Hotel</th>
            <th>Alamat Hotel</th>
            <th>Keterangan Kode</th>
            <th>Foto Hotel</th>
            <th>Area ID</th>

            <th colspan="2" style="text-align: center">Action</th>
          </tr>
        </thead>

        <tbody class="table-danger">
          
          <?php

          $query = mysqli_query($connection, " SELECT * FROM hotel ");

          // if(isset($_POST["kirim"]))
          // {
          //   $search = $_POST['search'];
          //   $query = mysqli_query($connection, "select hotel.*, hotel.hotel_ID, hotel.hotel_nama, hotel.hotel_alamat, area.area_ID, area.area_nama, area.area_wilayah, area.area_keterangan
          //     from area, hotel 
          //     where hotel_nama like '%".$search."%'
          //     and area.area_ID = hotel.area_ID");
          // }else{
          //   $query = mysqli_query($connection, "select hotel.*, hotel.hotel_ID, hotel.hotel_nama, hotel.hotel_alamat
          //     from hotel, area
          //     where hotel.hotel_ID = area.area_ID");
          // } 

            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['hotel_ID'];?></td>
                <td><?php echo $row['hotel_nama'];?></td>
                <td><?php echo $row['hotel_alamat'];?></td>
                <td><?php echo $row['hotel_keterangan'];?></td>
                <td>
                  <?php if(is_file("images/".$row['hotel_foto']))
                  { ?>

                  <img src="images/<?php echo $row['hotel_foto']; ?>" width="90">

                  <?php } else
                    echo "<img src='images/noimage.png' width='80'>";
                  ?>
                </td>
                <td><?php echo $row['area_ID'];?></td>

                <td>
                  <a href="hoteledit.php?ubah=<?php echo $row["hotel_ID"];?>" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
              
                <td>
                  <a href="hotelhapus.php?hapus=<?php echo $row["hotel_ID"];?>" class="btn btn-danger btn-sm" title="DELETE">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                  </a>
                </td>
              </tr>
      <?php $nomor = $nomor + 1; ?>
      <?php } ?>
        </tbody>
    </table>

    

    </div>
    <div class="col-sm-1"></div>

  </div>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</div>
</div> 

<!-- PENUTUP CONTAINER FLUID -->

</html>

