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

  if(isset($_POST['Simpan'])) {

    if(isset($_REQUEST['input_kode']))
    {
      $dimaskode = $_REQUEST['input_kode'];
    }

    if(!empty($dimaskode))
    {
      $dimaskode = $_REQUEST['input_kode'];
    }
    else {
      die ("Anda Harus Memasukan Kodenya");
    }

    $dimaskode = $_POST['input_kode'];
    $destinasinama = $_POST['input_nama'];
    $destinasikodeID = $_POST['kode_destinasi'];

    mysqli_query($connection, "INSERT INTO dimas VALUES ('$dimaskode', '$destinasinama', '$destinasikodeID')");
    header("location:index.php");


  }

  $datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi");
  $datadimas = mysqli_query($connection, "SELECT * FROM dimas");


?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Journeydims</title>
</head>
<body>

<?php include "header.php"; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div class="display-4">Dashboard Admin</div>
  </div>
</div>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destinasi Wisata | Dimas</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

  <div class="row">
    <div class="col-sm-1">
    </div>

    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Input Tabel Dimas</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <form method="POST" action="">
        <div class="mb-3 row">
          <label for="kode_destinasi" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_destinasi" name="input_kode" placeholder="kode" maxlength="4">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama_destinasi" class="col-sm-2 col-form-label">Nama Negara</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_destinasi" name="input_nama" placeholder="Nama Negara">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Kode Destinasi</label>
          <div class="col-sm-10">
            <select class="form-control" id="kode_destinasi" name="kode_destinasi">
                <?php while ($row = mysqli_fetch_array($datadestinasi))
                { ?>
                  <option value="<?php echo $row["destinasi_ID"]; ?>">
                    <?php echo $row["destinasi_ID"]; ?>
                    <?php echo $row["destinasi_nama"]; ?>
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
          <h1 class="display-4">Daftar Tabel Dimas</h1>
          <h2>Hasil Entri Data Pada Tabel Dimas</h2>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>
      <br>
      
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Negara</th>
            <th>Kode Destinasi</th>
            <th>Nama Destinasi</th>

            <th colspan="2" style="text-align: center;">Action</th>
          </tr>
        </thead>

        <tbody class="table-danger">
          
          <?php

          $query = mysqli_query($connection, "select * from dimas, destinasi
          where dimas.destinasi_ID= destinasi.destinasi_ID");

          // if(isset($_POST['kirim']))
          // {
          //   $search = $_POST['search'];
          //   $query = mysqli_query($connection, "select dimas.*, dimas.dimasID, dimas.dimasNEGARA, destinasi.destinasi_ID, destinasi.destinasi_nama, destinasi.destinasi_alamat 
          //   from dimas, destinasi 
          //   where dimasNEGARA like '%".$search."%'
          //   and dimas.destinasi_ID = destinasi.destinasi_ID");
          // }
          
          // else

          // {
          //   $query = mysqli_query($connection, "select dimas.*, dimas.dimasID, dimas.dimasNEGARA
          //   from dimas, destinasi
          //   where dimas.destinasi_ID = destinasi.destinasi_ID");
          // }

            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['dimasID'];?></td>
                <td><?php echo $row['dimasNEGARA'];?></td>
                <td><?php echo $row['destinasi_ID'];?></td>
                <td><?php echo $row['destinasi_nama'];?></td>

                <!-- icon edit dan deleter -->

                <td>
                  <a href="indexedit.php?ubah=<?php echo $row["dimasID"];?>" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
              
                <td>
                  <a href="indexhapus.php?hapus=<?php echo $row["dimasID"];?>" class="btn btn-danger btn-sm" title="DELETE">
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

<?php

mysqli_close($connection);
ob_end_flush();

?>


<?php include "footer.php"; ?>
  
</body>
</html>