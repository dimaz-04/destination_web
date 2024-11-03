<!DOCTYPE html>

<?php
	include "includes/config.php";

	

	$datakategori = mysqli_query($connection, "select * from kategori");
	$dataarea = mysqli_query($connection, "select * from area");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Journey Dims | Destinasi Wisata</title>

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
<!--

</head>
<?php include "FEmenu.php"; ?>
<body>
  <div class="carousel-item active"  >
	<img src="images/IMG.05.JPG" class="d-block w-100" alt="Responsive image" style="height: 500px; width: 100%">
	<center>
<form method="POST" class="carousel-caption d-none d-md-block" style="position: center;" >
	
	<div class="form-group row mb-6">
		<div class="col-sm-10 ">
			<input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Destinasi">
		</div>
		<input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
	</div>
</form>
</center>
</div>

<br> <br>

		<table class="table table-hover table-danger">
			<thead class="thead-dark"	>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Destinasi Wisata</th>
					<th>Alamat Destinasi Wisata</th>
					<th>Kode Kategori</th>
					<th>Nama Kategori</th>
					<th>Kode Area</th>
					<th>Nama Area</th>
					
				</tr>
			</thead>

			<tbody>

      <?php

$jumlahtampilan = 3;
$halaman = (isset($_GET['page']))? $_GET['page'] : 1;
$mulaitampilan = ($halaman - 1) * $jumlahtampilan;

if(isset($_POST["kirim"]))
{
  $search = $_POST['search'];
  $query = mysqli_query($connection, "select destinasi.*, kategori.kategori_ID, kategori.kategori_nama, area.area_ID, area.area_nama 
    from destinasi, kategori, area 
    where destinasi_nama like '%".$search."%'
    and destinasi.kategori_ID = kategori.kategori_ID
    and destinasi.area_ID = area.area_ID limit $mulaitampilan, $jumlahtampilan");
}else

{
  $query = mysqli_query($connection, "select destinasi.*, kategori.kategori_ID, kategori.kategori_nama, area.area_ID, area.area_nama
    from destinasi, kategori, area
    where destinasi.kategori_ID = kategori.kategori_ID
    and destinasi.area_ID = area.area_ID limit $mulaitampilan, $jumlahtampilan");
}

  $nomor = 1;
  while ($row = mysqli_fetch_array($query))
  { ?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor;?></td>
      <td><?php echo $row['destinasi_ID'];?></td>
      <td><?php echo $row['destinasi_nama'];?></td>
      <td><?php echo $row['destinasi_alamat'];?></td>
      <td><?php echo $row['kategori_ID'];?></td>
      <td><?php echo $row['kategori_nama'];?></td>
      <td><?php echo $row['area_ID'];?></td>
      <td><?php echo $row['area_nama'];?></td>







    </tr>
<?php $nomor = $nomor + 1;?>
<?php } ?>

</tbody>
</table>
<?php
$query = mysqli_query($connection, "select * from destinasi");
$jumlahrecord = mysqli_num_rows($query);
$jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
?>

<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item"><a class="page-link" href="?page=<?php $nomorhal = 1; echo $nomorhal?>">Pertama</a></li>
<?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++) {
  ?> 

<li class="page-item">
  <?php if ($nomorhal!=$halaman)
  { ?>
  <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal ?></a>
<?php }
else { ?>
  <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal ?></a>
<?php } ?>
</li>

<?php } ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">Terakhir</a></li>
</ul>
</nav>



</div>

<div class="col-sm-1"></div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#kodekategori').select2({
  allowClear:true,
  placeholder: "Pilih Kategori Wisata"
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#kodearea').select2({
  allowClear: true,
  placeholder: "Pilih Area Wisata"
});
});
</script>
</body>


</html>
<?php include "FEfooter.php"; ?>