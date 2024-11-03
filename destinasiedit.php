<!DOCTYPE html>
<?php

  include "includes/config.php";

  if(isset($_POST['Edit'])) {

    if(isset($_REQUEST['input_kode']))
    {
      $destinasikode = $_REQUEST['input_kode'];
    }

    if(!empty($destinasikode))
    {
      $destinasikode = $_REQUEST['input_kode'];
    }
    else {
      die ("Anda Harus Memasukan Kodenya");
    }

    $destinasikode = $_POST['input_kode'];
    $destinasinama = $_POST['input_nama'];
    $destinasialamat = $_POST['input_alamat'];
    $kodekategori = $_POST['kode_kategori'];
    $kodearea = $_POST['kode_area'];

    /* mysqli_query($connection, "insert into destinasi values ('$destinasikode', '$destinasinama', '$destinasialamat', '$kodekategori', '$kodearea')"); 
    header("location:destinasi.php");
    */

    mysqli_query($connection,"UPDATE destinasi SET destinasi_nama = '$destinasinama', destinasi_alamat = '$destinasialamat', 
    kategori_ID = '$kodekategori', area_ID = '$kodearea' WHERE destinasi_ID = '$destinasikode'");
    header("location:destinasi.php");

  }

  $datakategori = mysqli_query($connection, "SELECT * FROM kategori");
  $dataarea = mysqli_query($connection, "SELECT * FROM area");

  //untuk menampilkan data pada form edit
  $kodedestinasi = $_GET["ubah"];
  $editdestinasi = mysqli_query($connection, "SELECT * FROM destinasi WHERE destinasi_ID = '$kodedestinasi' ");
  $rowedit = mysqli_fetch_array($editdestinasi);

  $editkategori = mysqli_query($connection, "SELECT * FROM destinasi, kategori 
  WHERE destinasi_ID = '$kodedestinasi' and destinasi.kategori_ID = kategori.kategori_ID ");

  $rowedit2 = mysqli_fetch_array($editkategori);

  $editarea = mysqli_query($connection, "SELECT * FROM destinasi, area 
  WHERE destinasi_ID = '$kodedestinasi' and destinasi.area_ID = area.area_ID ");

  $rowedit3 = mysqli_fetch_array($editarea);


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destinasi Wisata | Dimas</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <?php include "header.php"; ?>
  
  <div class="container-fluid">
  <div class="card shadow mb-4">

  <div class="row">
    <div class="col-sm-1">
    </div>

    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Input Destinasi Wisata</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <form method="POST" action="">
        <div class="mb-3 row">
          <label for="kode_destinasi" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_destinasi" name="input_kode"
            value="<?php echo $rowedit["destinasi_ID"]; ?>" >
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama_destinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_destinasi" name="input_nama" value="<?php echo $rowedit["destinasi_nama"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="alamat_destinasi" class="col-sm-2 col-form-label">Alamat Destinasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat_destinasi" name="input_alamat" value="<?php echo $rowedit["destinasi_alamat"]; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
          <div class="col-sm-10">
            <select class="form-control" id="kode_kategori" name="kode_kategori">
              <option value="<?php echo $rowedit["kategori_ID"]; ?>"><?php echo $rowedit["kategori_ID"]; ?>
              <?php echo $rowedit2['destinasi_nama']; ?>  </option>
                <?php while ($row = mysqli_fetch_array($datakategori))
                { ?>
                  <option value="<?php echo $row["kategori_ID"]; ?>">
                    <?php echo $row["kategori_ID"]; ?>
                    <?php echo $row["kategori_nama"]; ?>
                  </option>
          <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="referensi_kategori" class="col-sm-2 col-form-label">Area Wisata</label>
          <div class="col-sm-10">
            <select class="form-control" id="kode_area" name="kode_area">
            <option value="<?php echo $rowedit["area_ID"]; ?>"><?php echo $rowedit["area_ID"]; ?>
              <?php echo $rowedit3['area_nama']; ?>  </option>
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
          <h1 class="display-4">Daftar Destinasi Wisata</h1>
          <h2>Hasil Entri Data Pada Tabel Destinasi</h2>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>
      <br>
      
      <!-- Start Search Icon -->
      <form method="POST">
        <div class="form-group row mb-2">
          <label for="search" class="col-sm-3">Nama Destinasi</label>
          <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Destinasi" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
          </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-success" value="Search">
        </div>  
      </form>
      <!-- End Search Icon -->
      
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Destinasi Wisata</th>
            <th>Alamat Destinasi Wisata</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Kode Area</th>
            <th>Nama Area</th>

            <th colspan="2" style="text-align: center">Action</th>
          </tr>
        </thead>

        <tbody class="table-danger">
          
          <?php
          if(isset($_POST['kirim']))
          {
            $search = $_POST['search'];
            $query = mysqli_query($connection, "select destinasi.*, kategori.kategori_ID, kategori.kategori_nama, 
            area.area_ID, area.area_nama from destinasi, kategori, area where destinasi_nama like '%".$search."%'
            and destinasi.kategori_ID = kategori.kategori_ID
            and destinasi.area_ID = area.area_ID");
          }else{
            $query = mysqli_query($connection, "select destinasi.*, kategori.kategori_ID, kategori.kategori_nama, 
            area.area_ID, area.area_nama from destinasi, kategori, area where destinasi.kategori_ID = kategori.kategori_ID
            and destinasi.area_ID = area.area_ID");
          } 

            $nomor = 1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row['destinasi_ID'];?></td>
                <td><?php echo $row['destinasi_nama'];?></td>
                <td><?php echo $row['destinasi_alamat'];?></td>
                <td><?php echo $row['kategori_ID'];?></td>
                <td><?php echo $row['kategori_nama'];?></td>
                <td><?php echo $row['area_ID'];?></td>
                <td><?php echo $row['area_nama'];?></td>

                <!-- icon edit dan deleter -->

                <td>
                  <a href="destinasiedit.php?ubah=<?php echo $row["destinasi_ID"];?>" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>
              
                <td>
                  <a href="destinasihapus.php?hapus=<?php echo $row["destinasi_ID"];?>" class="btn btn-danger btn-sm" title="DELETE">
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
<!-- penutup header -->

</html>
