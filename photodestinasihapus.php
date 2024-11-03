<?php 

  include "includes/config.php";

  if(isset($_GET['hapusfoto']))
  {
    $fotokode =  $_GET['hapusfoto'];
    $hapusfoto = mysqli_query($connection, " SELECT * FROM fotodestinasi WHERE foto_ID = '$fotokode' "); 

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['fotofile'];

    mysqli_query($connection, " DELETE FROM fotodestinasi WHERE foto_ID = '$fotokode' ");

    unlink('images/'.$namafile);

    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location = 'photodestinasi.php' 
          </script>";
  }


?>