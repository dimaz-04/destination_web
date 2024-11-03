<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodehapuskab =  $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupaten_KODE = '$kodehapuskab' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'kabupaten.php' 
          </script>";
  }


?>