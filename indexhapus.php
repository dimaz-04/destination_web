<?php 

  include "includes/config.php";

  if(isset($_GET['hapus']))
  {
    $kodedimashapus = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM dimas WHERE dimasID = '$kodedimashapus' ");

    echo "<script>alert('Data Berhasil Dihapus');
          document.location = 'index.php' 
          </script>";
  }


?>