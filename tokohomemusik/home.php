<?php 
  require('config/db.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Toko Online Home Music Gitar</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/br1.png">
</head>
<body>

<?php include('component/nav.php'); ?>
<div class="container-fluid" id="isi" >
  

  <div class="row">
    <div class="col-xs-2 col-xs-offset-5" id="produk-laris">
      <h3 style="font-family: Blacksword; font-size:2.2em;"><strong>Produk Gitar Toko Home Music</strong></h3>
    </div>
  </div>
  


  <!-- Laman Gitar-->
  
  <div class="container" id="produk">
    <div class="tab-content">
      <!-- akustik -->
      <div id="akustik" class="tab-pane fade in active">
      <ul>
      <?php 
        require("config/db.php");
        $limit = 4;
        $sql = mysqli_query($conn, "SELECT count(idGitar) FROM tabel_gitar WHERE kategori='akustik'");
        $row = mysqli_fetch_array($sql, MYSQL_NUM);
        $rec_count = $row[0];
        if(isset($_GET['page'])){
          $page = $_GET['page'] + 1;
          $offset = $limit * $page;
        }else{
          $page = 0;
          $offset = 0;
        }
        $left_rec = $rec_count - ($page * $limit);
        $queryakustik = "SELECT * FROM tabel_gitar WHERE kategori='akustik' LIMIT $offset,$limit";
        $query_akustik = mysqli_query($conn, $queryakustik);

        while($arrayakustik = mysqli_fetch_array($query_akustik)){
		
          echo '
            <li>
              <a href="#'.$arrayakustik['idGitar'].'">
                <img src="admin/proses/'.$arrayakustik['path'].'" alt="'.$arrayakustik['nama'].'">
                <span></span>
              </a>
              <div class="overlay" id="'.$arrayakustik['idGitar'].'">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="admin/proses/'.$arrayakustik['path'].'">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>'.$arrayakustik['nama'].'</strong></h4>
                    <p>'.$arrayakustik['keterangan'].'</p>
                      <h5>Rp '. number_format($arrayakustik['harga'], 0, ',', '.').'</h5>
                    <h5 class="ukur">Ukuran : '.$arrayakustik['ukuran'].'</h5>
                    <button type="button" class="btn btn-success">Stock : '.$arrayakustik['stock'].'</button>
                    ';
              if(isset($_SESSION['idPelangan'])){
                if($arrayakustik['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idGitar='.$arrayakustik['idGitar'].'&idPelangan='.$idPelangan.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
        ?>
      <div class="clear"></div>
    </ul>

    <div class="container-fluid" id="paging">
      <div class="paging">
      <?php 
      if($left_rec < $limit){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
        }else if($page > 0){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }else if( $page == 0 ) {
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }
       ?>
    </div>
    </div>
    </div>
    <!-- end of pria -->

    <!-- wanita -->
      <div id="listrik" class="tab-pane fade">
      <ul>
      <?php 
        require("config/db.php");
        
        $querylistrik = "SELECT * FROM tabel_gitar WHERE kategori='listrik' LIMIT 0,4";
        $query_listrik = mysqli_query($conn,$querylistrik);

        while($arraylistrik = mysqli_fetch_array($query_listrik)){
          echo '
            <li>
        <a href="#'.$arraylistrik['idGitar'].'">
          <img src="admin/proses/'.$arraylistrik['path'].'" alt="'.$arraylistrik['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arraylistrik['idGitar'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arraylistrik['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arraylistrik['nama'].'</strong></h4>
              <p>'.$arraylistrik['keterangan'].'</p>
             <h5>Rp '.$arrayakustik=number_format($arrayakustik['harga'],0,",",".").'</h5>
              <h5 class="ukur">Ukuran : '.$arraylistrik['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arraylistrik['stock'].'</button>
              ';
              if(isset($_SESSION['idPelangan'])){
                if($arraylistrik['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idGitar='.$arraylistrik['idGitar'].'&idPelangan='.$idPelangan.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
       ?>
      <div class="clear"></div>
    </ul>
    </div>
    <!-- end of gitar listrik -->

    <!-- akustik gitar-->
      <div id="akustik" class="tab-pane fade">
      <ul>
        <?php 
        require("config/db.php");
        
        $queryakustik = "SELECT * FROM tabel_gitar WHERE kategori='akustik' LIMIT 0,10";
        $query_akustik = mysqli_query($conn,$queryakustik);

        while($arrayakustik = mysqli_fetch_array($query_akustik)){
          echo '
            <li>
            <a href="#'.$arrayakustik['idGitar'].'">
              <img src="admin/proses/'.$arrayCouple['path'].'" alt="'.$arrayakustik['nama'].'">
              <span></span>
            </a>
            <div class="overlay" id="'.$arrayakustik['idGitar'].'">
              <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
              <img src="admin/proses/'.$arrayakustik['path'].'">
              <div class="keterangan">
                <div class="container">
                  <h4><strong>'.$arrayakustik['nama'].'</strong></h4>
                  <p>'.$arrayakustik['keterangan'].'</p>
                  <h5>Rp '.$arrayakustik=number_format($arrayakustik['harga'],0,",",".").'</h5>
                  <h5 class="ukur">Ukuran : '.$arrayakustik['ukuran'].'</h5>
                  <button type="button" class="btn btn-success">Stock : '.$arrayakustik['stock'].'</button>
                  ';
                  if(isset($_SESSION['idPelangan'])){
                    if($arrayCouple['stock'] > 0){
                      echo '
                      <a href="proses/beli.php?idGitar='.$arrayakustik['idGitar'].'&idPelangan='.$idPelangan.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                    ';
                    }else{
                      echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
                    }
                  }else{
                    echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
                  }
                  echo '
                </div>
              </div>
            </div>
          </li>  
          ';
        }
       ?>
        <div class="clear"></div>
    </ul>
    </div>
    <!-- end of akustik gitar -->

    <!-- listrik gitar -->
      <div id="listrik" class="tab-pane fade">
      <ul>
        <?php 
        require("config/db.php");
        
        $querylistrik = "SELECT * FROM tabel_gitar WHERE kategori='listrik' LIMIT 0,4";
        $query_listrik = mysqli_query($conn,$querylistrik);

        while($arraylistrik = mysqli_fetch_array($query_listrik)){
          echo '
            <li>
        <a href="#'.$arraylistrik['idGitar'].'">
          <img src="admin/proses/'.$arraylistrik['path'].'" alt="'.$arraylistrik['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arraylistrik['idGitar'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arraylistrik['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arraylistrik['nama'].'</strong></h4>
              <p>'.$arraylistrik['keterangan'].'</p>
               <h5>Rp '.$arrayakustik=number_format($arraylistrik['harga'],0,",",".").'</h5>
              <h5 class="ukur">Ukuran : '.$arraylistrik['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arraylistrik['stock'].'</button>
              ';
              if(isset($_SESSION['idPelangan'])){
                if($arraylistrik['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idGitar='.$arraylistrik['idGitar'].'&idPelangan='.$idPelangan.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
       ?>
      <div class="clear"></div>
    </ul>
    </div>
    <!-- end of gitar listrik -->


    </div>
    
  </div>

</div>



<?php include('component/footer.php'); ?>


<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>