<!DOCTYPE html>

<?php 
  include "includes/config.php";
?>

<?php

  include "includes/config.php";

  if(isset($_POST['Simpan'])) {

    if(isset($_REQUEST['input_kode']))
    {
      $kategorikode = $_REQUEST['input_kode'];
    }

    if(!empty($kategorikode))
    {
      $kategorikode = $_REQUEST['input_kode'];
    }
    else {
      ?> <h1>Anda Harus Mengisi Data Dahulu !!</h1> <?php
      die ("Anda Harus Memasukan Datanya");
    }

    $kategorikode = $_POST['input_kode'];
    $kategorinama = $_POST['input_nama'];
    $kategoriket = $_POST['input_ket'];
    $kategoriref = $_POST['input_ref'];

    mysqli_query($connection, "insert into kategori values ('$kategorikode', '$kategorinama', '$kategoriket', '$kategoriref')");

    header("location:inputoutput.php");


  }


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Output Kategori Wisata | Dimas</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

  <div class="row">
    <div class="col-sm-1">
    </div>

    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Input Kategori Wisata</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <form method="POST" action="">
        <div class="mb-3 row">
          <label for="kode_kategori" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_kategori" name="input_kode" placeholder="kode kategori" maxlength="4">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama_kategori" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_kategori" name="input_nama" placeholder="Nama kategori">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="keterangan_kategori" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="keterangan_kategori" name="input_ket" placeholder="Keterangan kategori">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Referensi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="referensi_kategori" name="input_ref" placeholder="Referensi kategori">
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
          <h1 class="display-4">Daftar Kategori Wisata</h1>
          <h2>Hasil Entri Data Pada Tabel Kategori</h2>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>
      <br>

      <form method="POST">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Nama Kategori</label>
          <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Kategori" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-success" value="Search">
        </div>  
      </form>
      
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kategori</th>
            <th>Keterangan</th>
            <th>Referensi</th>
          </tr>
        </thead>

        <tbody class="table-danger">
          
          <?php
          if(isset($_POST['kirim']))
          {
            $search = $_POST['search'];
            $query = mysqli_query($connection, "select * from kategori where kategori_nama like '%".$search."%'
              or kategori_keterangan like '%".$search."%'
              or kategori_referensi like '%".$search."%'");
          }else{
            $query = mysqli_query($connection, "select * from kategori");
          } 

            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['kategori_ID'];?></td>
                <td><?php echo $row['kategori_nama'];?></td>
                <td><?php echo $row['kategori_keterangan'];?></td>
                <td><?php echo $row['kategori_referensi'];?></td>
              </tr>
      <?php $nomor = $nomor + 1; ?>
      <?php } ?>
        </tbody>
    

      </table>

    

    </div>
    <div class="col-sm-1"></div>

  </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
