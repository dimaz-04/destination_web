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

  if(isset($_POST['Edit'])) {

    if(isset($_REQUEST['input_kode']))
    {
      $kodekab = $_REQUEST['input_kode'];
    }

    if(!empty($kodekab))
    {
      $kodekab = $_REQUEST['input_kode'];
    }
    else {
      die ("Anda Harus Memasukan Kodenya");
    }

    // Mengambil nilai input dari form
    $kodekab = $_POST['input_kode'];
    $kabupatennama = $_POST['input_nama'];
    $kabupatenalamat = $_POST['input_alamat'];
    $ketkabupaten = $_POST['input_ket'];
    $ketfoto = $_POST['input_ketfot'];

    // Periksa ekstensi file harus jpg atau JPG
    $nama = $_FILES['file']['name'];
    $file_tmp = $_FILES["file"]["tmp_name"];

    if(empty($nama))
    {
      mysqli_query($connection, " UPDATE kabupaten SET kabupaten_NAMA = '$kabupatennama', kabupaten_KODE = '$kodekab'
      WHERE kabupaten_KODE = '$kodekab' ");
      header("location:kabupaten.php");
    }
    
    else

    $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

    //PERIKSA EKSTEN FILE HARUS JPG ATAU PNG
    if(($ekstensifile == "jpg") or ($ekstensifile == "JPG")) 
    {
      move_uploaded_file($file_tmp, "images/".$nama); //unggah ke folder images
      mysqli_query($connection, "UPDATE kabupaten SET kabupaten_NAMA = '$kabupatennama', kabupaten_KODE = '$kodekab',
      kabupaten_FOTOICON = '$nama' WHERE kabupaten_KODE = '$kodekab' ");
      header("location:kabupaten.php");
    }

    mysqli_query($connection,"UPDATE kabupaten SET kabupaten_NAMA = '$kabupatennama', kabupaten_ALAMAT = '$kabupatenalamat', 
    kabupaten_KET = '$ketkabupaten', kabupaten_FOTOICON = '$nama', kabupaten_FOTOICONKET	= '$ketfoto' WHERE kabupaten_KODE = '$kodekab'");
    header("location:kabupaten.php");
}

$datakabupaten = mysqli_query($connection, "select * from kabupaten");
$dataarea = mysqli_query($connection, "select * from area");
$query = mysqli_query($connection, "SELECT * FROM kabupaten ");

//untuk menampilkan data pada form edit
$kodekab = $_GET["ubah"];
$editkab = mysqli_query($connection, "SELECT * FROM kabupaten WHERE kabupaten_KODE = '$kodekab' ");
$rowedit = mysqli_fetch_array($editkab);


?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kabupaten | Dimas</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <?php include "header.php"; ?>
  
  <div class="container-fluid">
  <div class="card shadow mb-4">
    
</head>

  <div class="row">
    <div class="col-sm-1">
    </div>

    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Edit Kabupaten</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3 row">
          <label for="kode_destinasi" class="col-sm-2 col-form-label">Kode Kabupaten</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_destinasi" name="input_kode" placeholder="kode Kabupaten"
            maxlength="4" value="<?php echo $rowedit["kabupaten_KODE"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama_destinasi" class="col-sm-2 col-form-label">Nama Kabupaten</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_destinasi" name="input_nama" placeholder="Nama Kabupaten"
            value="<?php echo $rowedit["kabupaten_NAMA"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="alamat_destinasi" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat_destinasi" name="input_alamat" placeholder="Alamat Kabupaten"
            value="<?php echo $rowedit["kabupaten_ALAMAT"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="alamat_destinasi" class="col-sm-2 col-form-label">Keterangan Kabupaten</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat_destinasi" name="input_ket" placeholder="Keterangan Kabupaten"
            value="<?php echo $rowedit["kabupaten_KET"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="file" class="col-sm-2 col-form-label">Foto Icon Kabupaten</label>
            <div class="col-sm-10">
              <input type="file" id="file" name="file">
              <img src="images/<?php echo $rowedit['kabupaten_FOTOICON']; ?>" style="width: 200px; height: 100px;">
              <p class="help-block">Field ini digunakan untuk Unggah file</p>
            </div>
        </div>

        <div class="mb-3 row">
          <label for="alamat_destinasi" class="col-sm-2 col-form-label">Keterangan Foto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat_destinasi" name="input_ketfot" placeholder="Keterangan Foto">
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-2 ">
          </div>
          <div class="col-sm-10">
            <input type="submit" class="btn btn-warning" value="Edit" name="Edit">
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
          <h1 class="display-4">Daftar Kabupaten</h1>
          <h2>Hasil Entri Data Pada Tabel Kabupaten</h2>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>
      <br>
      
      <!-- Start Search Icon -->
      <form method="POST" action="?page=<?php echo $halaman; ?>">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Nama Kabupaten</label>
          <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Kabupaten" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-success" value="Search">
        </div>  
      </form>
      <!-- End Search Icon -->
      
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode Kabupaten</th>
            <th>Nama Kabupaten</th>
            <th>Alamat Kabupaten</th>
            <th>Keterangan</th>
            <th>Foto Icon Kabupaten</th>
            <th>Keterangan Kabupaten</th>

            <th colspan="2" style="text-align: center">Action</th>
          </tr>
        </thead>

        <tbody class="table-danger">
          
          <?php

          // if(isset($_POST['kirim']))
          // {
          //   $search = $_POST['search'];
          //   $query = mysqli_query($connection, "select kabupaten.*, kabupaten.kabupaten_KODE, kabupaten.kabupaten_NAMA, 
          //   area.area_ID, area.area_nama from area, kabupaten where kabupaten_NAMA like '%".$search."%'
          //   and kabupaten.kabupaten_KODE = area.kabupaten_KODE");
          // }else{
          //   $query = mysqli_query($connection, "select kabupaten.*, kabupaten.kabupaten_KODE, kabupaten.kabupaten_NAMA, 
          //   area.area_ID, area.area_nama from area, kabupaten where area.kabupaten_KODE = kabupaten.kabupaten_KODE");
          // } 

            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['kabupaten_KODE'];?></td>
                <td><?php echo $row['kabupaten_NAMA'];?></td>
                <td><?php echo $row['kabupaten_ALAMAT'];?></td>
                <td><?php echo $row['kabupaten_KET'];?></td>
                <td>
                  <?php if(is_file("images/".$row['kabupaten_FOTOICON']))
                  { ?>

                  <img src="images/<?php echo $row['kabupaten_FOTOICON']; ?>" width="90">

                  <?php } else
                    echo "<img src='images/noimage.png' width='80'>";
                  ?>
                </td>
                <td><?php echo $row['kabupaten_FOTOICONKET'];?></td>
                <!-- icon edit dan deleter -->

                <td>
                  <a href="kabupatenedit.php?ubah=<?php echo $row["kabupaten_KODE"];?>" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
              
                <td>
                  <a href="kabupatenhapus.php?hapus=<?php echo $row["kabupaten_KODE"];?>" class="btn btn-danger btn-sm" title="DELETE">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                  </a>
                </td>

                <!-- akhir icon edit dan deleter -->
              </tr>
      <?php $nomor = $nomor + 1; ?>
      <?php } ?>
        </tbody>
    

      </table>
    </div>
    <div class="col-sm-1"></div>

  </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#kode_kategori').select2({
      allowClear: true,
      placeholder: 'Pilih Kategori Wisata'
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#kode_area').select2({
      allowClear: true,
      placeholder: 'Pilih Area Wisata'
    });
  });
</script>

</div>
</div> 
<!-- penutup container-fluid -->

<?php include "footer.php"; ?>

<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>
