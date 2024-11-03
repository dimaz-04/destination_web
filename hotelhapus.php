<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodehotelhapus = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM hotel WHERE hotel_ID = '$kodehotelhapus' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'hotel.php' 
          </script>";
  }


?>