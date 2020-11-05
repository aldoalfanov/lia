<?php 
  require('../config/db.php');
  session_start();
  $idGitar = $_GET['idGitar'];
  $idPelangan = $_GET['idPelangan'];

  $query = mysqli_query($conn, "SELECT harga FROM tabel_gitar WHERE idGitar='$idGitar'");
  $data = mysqli_fetch_array($query);
  $harga = $data['harga'];
  
  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_trolly (idPelangan, idGitar, jumlah, harga) VALUES ('$idPelangan','$idGitar',1,'$harga')");

  if($queryInsert){
    header('location: ../keranjang.php');
  }



 ?>