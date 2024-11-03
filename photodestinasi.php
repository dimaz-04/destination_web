<!DOCTYPE html>

<?php

include "includes/config.php";

if(isset($_POST['Simpan']))
{
  $kodepoto = $_POST['input_kode_foto'];
  $namapoto = $_POST['input_nama_foto'];
  $kodedestinasi = $_POST['kodedestinasi'];
  
  $nama = $_FILES['file']['name'];
  $file_tmp = $_FILES["file"]["tmp_name"];

  $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

  //PERIKSA EKSTEN FILE HARUS JPG ATAU PNG
  if(($ekstensifile == "jpg") or ($ekstensifile == "JPG")) 
  {
    move_uploaded_file($file_tmp, "images/".$nama); //unggah ke folder images
    mysqli_query($connection, "INSERT INTO fotodestinasi VALUES ('$kodepoto', '$namapoto', '$kodedestinasi', '$nama')");
    header("location:photodestinasi.php");
  }
}

$datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi ");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WISATA</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="container-fluid">
<div class="card shadow mb-4">

    <div class="row">
        <div class="col-sm-1">
        </div>

    <div class="col-sm-10">
      <div class="jumbotron ">
        <div class="container">
          <h1 class="display-4">Input Photo Wisata</h1>
        </div>
      </div> <!-- penutup Jumbotron -->

      <br>

      <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3 row">
          <label for="kode_foto" class="col-sm-2 col-form-label">Kode Photo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_foto" name="input_kode_foto" placeholder="kode Photo" maxlength="4">
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="nama_photo" class="col-sm-2 col-form-label">Nama Photo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_photo" name="input_nama_foto" placeholder="Nama Photo">
          </div>
        </div>
        
        <div class="form-group mb-3 row">
          <div class="form-group mb-3 row">
            <label for="nama_destinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
            <div class="col-sm-10">
              <select class="form-control" id="namadestinasi" name="kodedestinasi">
                <?php while($row = mysqli_fetch_array($datadestinasi))
                { ?>
  
                  <option value="<?php echo $row["destinasi_ID"]; ?>">
                    <?php echo $row["destinasi_ID"]; ?>
                    <?php echo $row["destinasi_nama"]; ?>
                  </option>                
  
                <?php } ?>
              </select>
            </div>
          </div>

          <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
          <div class="col-sm-10">
            <input type="file" id="file" name="file">
            <p class="help-block">Field ini digunakan untuk Unggah file</p>
          </div>
        </div>
        
        <div class="form-group mb-3 row">
          <div class="col-sm-2 "></div>
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

  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fuild">
        <div class="container">
          <h1 class="display-4">Daftar Foto Destinasi Wisata</h1>
        </div>
      </div>

      <br>

      <table class="table table-hover table-danger">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Kode Photo</th>
            <th>Nama Photo Wisata</th>
            <th>Kode Destinasi</th>
            <th>Foto Destinasi</th>
            <th colspan="2" style="text-align: center">Action</th>
          </tr>
        </thead>

        <tbody class="">
          <?php
            $query = mysqli_query($connection, "SELECT * FROM fotodestinasi");
            
            $nomor = 1;
            while ($row = mysqli_fetch_array($query))
            { ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $row['foto_ID']; ?></td>
                <td><?php echo $row['foto_nama']; ?></td>
                <td><?php echo $row['destinasi_ID']; ?></td>
                <td>
                  <?php if(is_file("images/".$row['foto_file']))
                  { ?>

                  <img src="images/<?php echo $row['foto_file']; ?>" width="90">

                  <?php } else
                    echo "<img src='images/noimage.png' width='80'>";
                  ?>
                </td>

                <td>
                  <a href="photodestinasiubah.php?ubafoto=<?php echo $row['foto_ID']; ?>" class="btn btn-warning btn-sm-" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                </td>

                <td>
                  <a href="photodestinasihapus.php?hapusfoto=<?php echo $row['foto_ID']; ?>" class="btn btn-secondary btn-sm-" title="Delete">
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

<?php include "footer.php"; ?>