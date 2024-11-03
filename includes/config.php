<?php

  /* ini koneksi ke database */

  $servename = "localhost";
  $username = "root";
  $password = "";
  $dbname = "a_wisata";


  $connection = mysqli_connect($servename, $username, $password, $dbname);

  if(!$connection) {
    die("Connetion Failed : " .mysqli_connect_error());
  }


?>