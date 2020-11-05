<?php 
  require('../config/db.php');
  $idKategori = $_GET['idKategori'];
  $query = mysqli_query($conn, "DELETE FROM tabel_Kategori WHERE idKategori = '$idKategori' ");
  if($query){
    echo '
      <script>
      alert("Kategori Gitar berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }

 ?>