<!DOCTYPE html>

<?php 
  include "includes/config.php";
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




        ?>

      </tbody>
  

    </table>

  

  </div>
  <div class="col-sm-1"></div>

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
