<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodedestinasi =  $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM destinasi WHERE destinasi_ID = '$kodedestinasi' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'destinasi.php' 
          </script>";
  }


?>