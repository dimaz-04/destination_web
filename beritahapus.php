<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodehapusberita =  $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM berita WHERE berita_ID = '$kodehapusberita' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'berita.php' 
          </script>";
  }


?>