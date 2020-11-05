<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');


  $namaKategori = $_POST['namaKategori'];
  
  $query = mysqli_query($conn, " INSERT INTO tabel_Kategori (namaKategori) VALUES ('$namaKategori')");
  
  if($query){
    echo '
      <script>
        alert("Kategori Gitar berhasil ditambahkan");
        window.location = "../admin.php"
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Terjadi Kesalahan, silahkan ulangi.");
        window.location = "../admin.php"
      </script>
    ';
  }
 ?>