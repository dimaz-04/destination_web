<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodearea =  $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM area WHERE area_ID = '$kodearea' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'area.php' 
          </script>";
  }


?>