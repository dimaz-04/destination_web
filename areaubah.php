<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Area Wisata</title>
	
</head>
<body>

	<?php 
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
		header("location:login.php"); ?>


<?php include "header.php"; ?>

<div class="container-fluid">
	<div class="card shadow mb-4">


<?php
	include "includes/config.php";

	if(isset($_POST['Edit']))
	{
		if(isset($_REQUEST['inputkode']))
		{
			$areakode = $_REQUEST['inputkode'];
		}	

		if  (!empty($areakode))
		{
			$areakode = $_REQUEST['inputkode'];
		}

		else {
			die ("Anda harus memasukan kodenya");
		}

		$areanama = $_POST['inputnama'];
		$alamat = $_POST['alamat'];
		$keteranganarea = $_POST['keteranganarea'];
		$kodekabupaten = $_POST["kodekabupaten"];

		mysqli_query($connection,"UPDATE area SET area_nama = '$areanama', area_wilayah = '$alamat', 
    area_keterangan = '$keteranganarea', kabupaten_KODE = '$kodekabupaten' WHERE area_ID = '$areakode'");
		header("location:area.php");
	}

	$datakabupaten = mysqli_query($connection, "select * from kabupaten");
	$dataarea = mysqli_query($connection, "select * from area");

	//untuk menampilkan data pada form edit
  $kodearea = $_GET["ubah"];
  $editarea = mysqli_query($connection, "SELECT * FROM area WHERE area_ID = '$kodearea' ");
  $rowedit = mysqli_fetch_array($editarea);

  $editarea = mysqli_query($connection, "SELECT * FROM area, kabupaten 
  WHERE area_ID = '$kodearea' and area.kabupaten_KODE = kabupaten.kabupaten_KODE ");

  $rowedit2 = mysqli_fetch_array($editarea);

  // $editarea = mysqli_query($connection, "SELECT * FROM destinasi, area 
  // WHERE destinasi_ID = '$kodedestinasi' and destinasi.area_ID = area.area_ID ");

  // $rowedit3 = mysqli_fetch_array($editarea);

?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Destinasi Wisata</title>
	<link rel="stylesheet" type="text/css" href="https:/cdnjs.cloud.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>


<div class="row">

	<div class="col-sm-1">
  		
  	</div>

  	<div class="col-sm-10">

		<div class="jumbotron jumbotron-fluid">
						<div class="container">
							<h1 class="display-4">Input Area Wisata</h1>
							
						</div>
					</div>


    <form method="POST">
  <div class="form-group row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodearea" name="inputkode" placeholder="Kode Area"
			maxlength="4" value="<?php echo $rowedit["area_ID"]; ?>">
    </div>
	</div>

    <div class="form-group row">
    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnama" id="namadestinasi" placeholder="Nama Area"
			value="<?php echo $rowedit["area_nama"]; ?>">
    </div>
	</div>

    <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Area"
			value="<?php echo $rowedit["area_wilayah"]; ?>">
    </div>
	</div>
	
	<div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="keteranganarea" id="areaketerangan" placeholder="Keterangan Area"
			value="<?php echo $rowedit["area_keterangan"]; ?>">
    </div>
	</div>

    


    <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-10">
      <select class="form-control" id="kodekabupaten" name="kodekabupaten">
      	
      		<?php while ($row = mysqli_fetch_array($datakabupaten)) 
      		{ ?>
      			<option value="<?php echo $row["kabupaten_KODE"]?>">
      				<?php echo $row["kabupaten_KODE"]?>
      				<?php echo $row["kabupaten_NAMA"]?>

      				</option>
      		<?php } ?>
      	
      </select>
    </div>
</div>





	<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
      <input type="submit" class="btn btn-primary" value="Edit" name="Edit">
<input type="button" class="btn btn-secondary" value="Batal" name="Batal">
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
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Daftar Area Wisata</h1>
					<h2>Hasil Entri Data pada Table Area</h2>
				</div>
			</div>


<form method="POST">
	<div class="form-group row mb-2">
		<label for="search" class="col-sm-3">Area Destinasi</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Area">
		</div>
		<input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
	</div>
</form>

		
		<table class="table table-hover table-danger">
			<thead class="thead-dark"	>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Area</th>
					<th>Nama Area</th>
					<th>Wilayah Area</th>
					<th>Keterangan Area</th>
					<th>Kode Kabupaten</th>
					<th>Nama Kabupaten</th>
					<th>Alamat Kabupaten</th>

					
					<th colspan="2" style="text-align: center;">Action</th>
				</tr>
			</thead>

			<tbody>

		<?php

		if(isset($_POST["kirim"]))
		{
			$search = $_POST['search'];
			$query = mysqli_query($connection, "select area.area_ID, area.area_nama, area.area_wilayah, area.area_keterangan, kabupaten.kabupaten_KODE kabupaten.kabupaten_NAMA, kabupaten.kabupaten_ALAMAT 
				from area, kabupaten 
				where areanama like '%".$search."%'
				and area.kabupaten_KODE= kabupaten.kabupaten_KODE");
		}else

		{
			$query = mysqli_query($connection, "select area.*, kabupaten.kabupaten_KODE, kabupaten.kabupaten_NAMA, kabupaten.kabupaten_ALAMAT
				from kabupaten, area
				where kabupaten.kabupaten_KODE = area.kabupaten_KODE");
		}

			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['area_ID'];?></td>
					<td><?php echo $row['area_nama'];?></td>
					<td><?php echo $row['area_wilayah'];?></td>
					<td><?php echo $row['area_keterangan'];?></td>
					<td><?php echo $row['kabupaten_KODE'];?></td>
					<td><?php echo $row['kabupaten_NAMA'];?></td>
					<td><?php echo $row['kabupaten_ALAMAT'];?></td>

<td>
	<a href="areaubah.php?ubah=<?php echo $row["area_ID"]?>" 
		class="btn btn-success btn-sm" title="EDIT">

	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</a>
</td>

<td>
	<a href="areahapus.php?hapus=<?php echo $row["area_ID"]?>" class="btn btn-danger btn-sm" title="DELETE">

	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
</a>
</td>





				</tr>
		<?php $nomor = $nomor + 1;?>
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
	$(document).ready(function(){
		$('#kodekabupaten').select2({
			allowClear:true,
			placeholder: "Pilih Kabupaten Wisata"
		});
	});
</script>



</div>
</div>

<?php include "footer.php";?>

<?php

mysqli_close($connection);
ob_end_flush();

?>
</html>