<?php 

  require('../config/db.php');
  $idPelangan = $_GET['idPelangan'];
  $total = $_GET['total'];
  $queryTrolly = mysqli_query($conn, "SELECT * FROM tabel_trolly WHERE idPelangan='$idPelangan'");
  $tanggal = date("Y-m-d H:i:s");

  $barang = "";
  while($data = mysqli_fetch_array($queryTrolly)){
    $queryBarang = mysqli_query($conn, "SELECT * FROM tabel_gitar WHERE idGitar='$data[idGitar]'");
    $arrayBarang = mysqli_fetch_array($queryBarang);
    $kategori = $arrayBarang['kategori'];
    $nama = $arrayBarang['nama'];
    $jumlah = $data['jumlah'];
    $jumlahBarang = $arrayBarang['stock'] - $data['jumlah'];
    $updateJumlah = mysqli_query($conn, "UPDATE tabel_gitar SET stock='$jumlahBarang' WHERE idGitar='$data[idGitar]'");
    $barang = $barang . $nama.", Kategori : " .$kategori.", Jumlah : " . $jumlah. "<br>";
  }

  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_transaksi (idPelangan, daftarBarang, tanggal, total) VALUES ('$idPelangan', '$barang', '$tanggal', '$total')");

  $query = mysqli_query($conn, "DELETE FROM tabel_trolly WHERE idPelangan='$idPelangan'");
  
  if($query){
    echo '
      <script>
      alert("Terima Kasih sudah Berbelanja, Silahkan Tranfer ke Rekening Mandiri 140-0-0-165473-4 an. Yosef Idhy Putra Usman. Barang anda akan segera kami kirim setelah pembayaran dilakukan. Semoga anda nyaman dengan layanan kami.!");
      window.location = "../home.php";
      </script>
    ';
  }
 ?>