<?php
	/** ini koneksi ke database **/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "a_wisata";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection)
	{
		die("Connextion Failed : ".mysqli_connect_error());
	}
?>