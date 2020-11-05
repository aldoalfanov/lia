<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Laman Admin</title>
  <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/admin.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-2" id="sideLeft">
      <h4><strong>Administrator</strong></h4>
      <ul class="nav nav-pills nav-stacked" id="data">
        <li class="active"><a data-toggle="tab" href="#user">User</a></li>
        <li><a data-toggle="tab" href="#gitar">Gitar</a></li>
        <li><a data-toggle="tab" href="#transaksi">Transaksi</a></li>
		 <li><a data-toggle="tab" href="#kategori">Kategori</a></li>
        <li><a data-toggle="tab" href="#komen">Komentar</a></li>
        <li><a data-toggle="tab" href="#admin">Admin</a></li>
        <li><a href="proses/logout.php">
          <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>Logout</button></a>
        </li>
      </ul>
    </div>
    
    <div class="col-xs-10">
      <div class="tab-content">

        <!-- tabel user -->
        <div id="user" class="tab-pane fade in active">
          <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel User</strong></h3>  
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="id-user ">ID User</th>
                      <th class="nama-user ">Nama</th>
                      <th class="telp-user ">Nomor Telp</th>
                      <th class="email-user ">Email</th>
                      <th class="alamat-user ">Alamat</th>
                      <th class="hapus "></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                      $queryPelangan = mysqli_query($conn, "SELECT * FROM tabel_Pelangan ORDER BY idPelangan ASC");
                      while($arrayPelangan = mysqli_fetch_array($queryPelangan)){
                        echo '
                          <tr>
                            <td class="id-user ">'.$arrayPelangan['idPelangan'].'</td>
                            <td class="nama-user ">'.$arrayPelangan['nama'].'</td>
                            <td class="telp-user ">'.$arrayPelangan['telpon'].'</td>
                            <td class="email-user text-justify">'.$arrayPelangan['email'].'</td>
                            <td class="alamat-user text-left">'.$arrayPelangan['alamat'].'</td>
                            <td class="hapus"><a href="proses/hapusUser.php?idPelangan='.$arrayPelangan['idPelangan'].'">
                              <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                            </a></td>
                          </tr>
                        ';
                      }

                     ?>   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- end of table user -->

        <!-- komentar -->
        <div id="komen" class="tab-pane fade">
          <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel Komentar User</strong></h3>  
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="id-user ">ID Komentar</th>
                      <th class="nama-user ">Nama</th>
                      <th class="email-user ">Email</th>
                      <th class="alamat-user ">Pesan</th>
                      <th class="hapus "></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                      $queryKomen = mysqli_query($conn, "SELECT * FROM tabel_komentar ORDER BY idKomen ASC");
                      $jumlahKomen = mysqli_num_rows($queryKomen); 
                      if($jumlahKomen == 0){
                          echo '
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width: 50vw">Belum Ada Komentar</td>
                            <td></td>
                          </tr>
                        ';
                      }else{
                        while($arrayKomen = mysqli_fetch_array($queryKomen)){
                          echo '
                            <tr>
                              <td class="id-user ">'.$arrayKomen['idKomen'].'</td>
                              <td class="nama-user ">'.$arrayKomen['nama'].'</td>
                              <td class="email-user text-justify">'.$arrayKomen['email'].'</td>
                              <td class="alamat-user text-left">'.$arrayKomen['pesan'].'</td>
                              <td class="hapus"><a href="proses/hapusKomen.php?idKomen='.$arrayKomen['idKomen'].'">
                                <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                              </a></td>
                            </tr>
                          ';
                        }
                      }
                      

                     ?>   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- komentar -->

		  
		     <!-- kategori -->
         <div id="kategori" class="tab-pane fade">
          <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
              <h3 class="table-title"><strong>Tabel Kategori</strong></h3>   
              <button type="button" class="btn btn-success" id="tambah-data-kategori" data-toggle="modal" data-target="#form-kategori">Add Kategori</button>

              <!-- modal form-admin -->
              <div class="modal fade" id="form-kategori" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="margin-left:150px"><strong>Tambahkan Kategori</strong></h4>
                  </div>
                  <div class="modal-body">
                    <form action="proses/tambahKategori.php" method="post" role="form">
                      
                      <div class="form-group">
                        <label for="nama-kategori">Nama Kategori</label>
                       <input type="text" class="form-control" id="nama-kategori" name="namaKategori">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end of modal -->

              <table class="table table-hover" id="tabel-kategori">
                <thead>
                  <tr>
                    <th class="id-kategori text-center">ID Kategori</th>
                    <th class="nama-kategori text-center">Nama Kategori</th>
                    
                    <th class="hapus text-center"></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                  $queryAdmin = mysqli_query($conn, "SELECT * FROM tabel_Kategori");
                  while($arrayAdmin = mysqli_fetch_array($queryAdmin)){
                    echo '
                      <tr>
                        <td class="id-kategori text-center">'.$arrayAdmin['idKategori'].'</td>
                        <td class="nama-kategori text-center">'.$arrayAdmin['namaKategori'].'</td>
                        
                        <td class="hapus">
                          <a href="proses/hapusKategori.php?idKategori='.$arrayAdmin['idKategori'].'">
                              <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                          </a>
                          </td>
                      </tr> 
                    ';
                  }
                 ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- kategori -->
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        <!-- tabel gitar -->
        <div id="gitar" class="tab-pane fade">
          <h3 class="table-title"><strong>Tabel Gitar</strong></h3>
          <button type="button" class="btn btn-success" id="tambah-data-barang" data-toggle="modal" data-target="#form-barang">Tambahkan Gitar</button>

          <!-- modal form-admin -->
              <div class="modal fade" id="form-barang" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="margin-left:150px"><strong>Tambahkan Gitar</strong></h4>
                  </div>
                  <div class="modal-body">
                      <form action="proses/tambahGitar.php" method="post" role="form" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="nama">Nama Gitar</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                      <div class="form-group">
                        <label for="foto">Foto Gitar</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga">
                      </div>
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                          <option value="akustik">Gitar Akustik</option>
                          <option value="listrik">Gitar Listrik</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <select class="form-control" id="ukuran" name="ukuran">
                          <option value="99 cm">99 CM</option>
                          <option value="135 cm">135 CM</option>
                          <option value="150 cm">150 CM</option>
                          <option value="152 cm">152 CM</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="stock">Stock Gitar</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                      </div>
                      <div class="form-group">
                        <label for="pesan">Keterangan : </label>
                        <textarea class="form-control" name="keterangan" style="resize:vertical" ></textarea>
                      </div>
                      <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                      <button type="submit" name="upload" class="btn btn-primary">Tambahkan</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end of modal -->
             

          <div class="container">
            <h4 class="draf-kategori">Kategori : </h4>
            <ul class="nav nav-pills" style="margin-left: 15vw;">
              <li class="dropdown active item-kategori">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori Gitar<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a data-toggle="tab" href="#tabel-akustik">Gitar Akustik</a></li>
                  <li><a data-toggle="tab" href="#tabel-listrik">Gitar Listrik</a></li>                     
                </ul>
              </li>
              <li class="item-kategori"><a data-toggle="tab" href="#tabel-semua">Semua Gitar</a></li>
                          
            
            </ul>
          </div>

            <div class="tab-content">
              <div id="tabel-akustik" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-11 col-offset-xs-1">
                    <table class="table table-condensed" style="width:80vw">
                      <thead>
                        <tr>
                          <th class="id-gitar text-center">ID Gitar</th>
                          <th class="nama-gitar text-center">Nama Gitar</th>
                          <th class="keterangan-gitar text-center">Keterangan</th>
                          <th class="harga-gitar text-center">Harga</th>
                          <th class="ukuran-gitar text-center">Ukuran</th>
                          <th class="stock-gitar text-center">Stock</th>
                          <th class="gambar">Gambar Gitar</th>
                          <th class="hapus"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                        $kategori = 'akustik';
                        $query = mysqli_query($conn, "SELECT idGitar, nama, keterangan, harga, ukuran, stock, path FROM tabel_gitar WHERE kategori='$kategori' ");
                        while($array = mysqli_fetch_array($query)){
                          echo '
                            <tr>
                              <td class="id-gitar text-center">'.$array['idGitar'].'</td>
                              <td class="nama-gitar text-center">'.$array['nama'].'</td>
                              <td class="keterangan-gitar text-justify">'.$array['keterangan'].'</td>
                              <td class="harga-gitar text-center">'.$array['harga'].'</td>
                              <td class="ukuran-gitar text-center">'.$array['ukuran'].'</td>
                              <td class="stock-gitar text-center">'.$array['stock'].'</td>
                              <td class="gambar"><img src="proses/'.$array['path'].'" style="width: 15vw; height:30vh"></td>
                              <td class="hapus"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal'.$array['idGitar'].'"><i class="glyphicon glyphicon-pencil"></i></button></td>
                            </tr>
                          ';
                          echo '
                             <!-- edit gitar -->
                        <div class="modal fade" id="modal'.$array['idGitar'].'" role="dialog">
                          <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 style="margin-left:150px"><strong>Edit Gitar</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="proses/updateProduk.php" method="post" role="form">
                                <input type="hidden" name="idGitar" value="'.$array['idGitar'].'">
                                <div class="form-group">
                                  <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                  <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                  <label for="stock">Stock Gitar (Jangan diisi apabila Stock tetap)</label>
                                  <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of modal edit Gitar -->
                          ';
                        }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div id="tabel-listrik" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-11 col-offset-xs-1">
                    <table class="table table-condensed" style="width:80vw">
                      <thead>
                        <tr>
                          <th class="id-gitar text-center">ID Gitar</th>
                          <th class="nama-gitar text-center">Nama Gitar</th>
                          <th class="keterangan-gitar text-center">Keterangan</th>
                          <th class="harga-gitar text-center">Harga</th>
                          <th class="ukuran-gitar text-center">Ukuran</th>
                          <th class="stock-gitar text-center">Stock</th>
                          <th class="gambar">Gambar Gitar</th>
                          <th class="hapus"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                        $kategori = 'listrik';
                        $query = mysqli_query($conn, "SELECT idGitar, nama, keterangan, harga, ukuran, stock, path FROM tabel_gitar WHERE kategori='$kategori' ");
                        while($array = mysqli_fetch_array($query)){
                          echo '
                            <tr>
                              <td class="id-gitar text-center">'.$array['idGitar'].'</td>
                              <td class="nama-gitar text-center">'.$array['nama'].'</td>
                              <td class="keterangan-gitar text-justify">'.$array['keterangan'].'</td>
                              <td class="harga-gitar text-center">'.$array['harga'].'</td>
                              <td class="ukuran-gitar text-center">'.$array['ukuran'].'</td>
                              <td class="stock-gitar text-center">'.$array['stock'].'</td>
                              <td class="gambar"><img src="proses/'.$array['path'].'" style="width: 15vw; height: 30vh"></td>
                              <td class="hapus"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal'.$array['idGitar'].'"><i class="glyphicon glyphicon-pencil"></i></button></td>
                            </tr>
                            ';
                            echo '
                             <!-- edit gitar -->
                        <div class="modal fade" id="modal'.$array['idGitar'].'" role="dialog">
                          <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 style="margin-left:150px"><strong>Edit Gitar</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="proses/updateProduk.php" method="post" role="form">
                                <input type="hidden" name="idGitar" value="'.$array['idGitar'].'">
                                <div class="form-group">
                                  <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                  <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                  <label for="stock">Stock Gitar (Jangan diisi apabila Stock tetap)</label>
                                  <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of modal edit Gitar -->
                          ';
                        }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div id="tabel-semua" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-11 col-offset-xs-1">
                    <table class="table table-condensed" style="width:80vw">
                      <thead>
                        <tr>
                          <th class="id-gitar text-center">ID Gitar</th>
                          <th class="nama-gitar text-center">Nama Gitar</th>
                          <th class="keterangan-gitar text-center">Keterangan</th>
                          <th class="harga-gitar text-center">Harga</th>
                          <th class="ukuran-gitar text-center">Ukuran</th>
                          <th class="stock-gitar text-center">Stock</th>
                          <th class="gambar">Gambar Gitar</th>
                          <th class="hapus"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                        $query = mysqli_query($conn, "SELECT idGitar, nama, keterangan, harga, ukuran, stock, path FROM tabel_gitar ");
                        while($array = mysqli_fetch_array($query)){
                          echo '
                            <tr>
                              <td class="id-gitar text-center">'.$array['idGitar'].'</td>
                              <td class="nama-gitar text-center">'.$array['nama'].'</td>
                              <td class="keterangan-gitar text-justify">'.$array['keterangan'].'</td>
                              <td class="harga-gitar text-center">'.$array['harga'].'</td>
                              <td class="ukuran-gitar text-center">'.$array['ukuran'].'</td>
                              <td class="stock-gitar text-center">'.$array['stock'].'</td>
                              <td class="gambar"><img src="proses/'.$array['path'].'" style="width: 15vw; height: 30vh"></td>
                              <td class="hapus"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal'.$array['idGitar'].'"><i class="glyphicon glyphicon-pencil"></i></button></td>
                            </tr>
                          ';
                          echo '
                             <!-- edit gitar -->
                        <div class="modal fade" id="modal'.$array['idGitar'].'" role="dialog">
                          <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 style="margin-left:150px"><strong>Edit Gitar</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="proses/updateProduk.php" method="post" role="form">
                                <input type="hidden" name="idGitar" value="'.$array['idGitar'].'">
                                <div class="form-group">
                                  <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                  <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                  <label for="stock">Stock Gitar (Jangan diisi apabila Stock tetap)</label>
                                  <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of modal edit gitar -->
                          ';
                        }
                       ?>
                     
             
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- end of tabel gitar -->

        <!-- tabel transaksi -->
        </div>
        
        <div id="transaksi" class="tab-pane fade">
          <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel Transaksi</strong></h3>  
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="id-transaksi text-center">ID Transaksi</th>
                      <th class="nama-pelangan text-center">Nama Pembeli</th>
                      <th class="text-center" style="width:30vw">Nama Barang</th>
                         <th class="alamat">Alamat User</th>
					  <th class="total">Total</th>
                   
                      <th class="tanggal">Tanggal</th>
                      <th class="hapus text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                  $querytransaksi = mysqli_query($conn, "SELECT * FROM tabel_transaksi
					INNER JOIN tabel_pelangan 
					ON tabel_transaksi.idPelangan = tabel_pelangan.idPelangan");
                  while($arraytransaksi = mysqli_fetch_array($querytransaksi)){
                    echo '
                      <tr>
                        <td class="id-transaksi text-center">'.$arraytransaksi['idTransaksi'].'</td>
                        <td class="nama-pelangan text-center">'.$arraytransaksi['nama'].'</td>
                        <td class="daftar-barang text-center">'.$arraytransaksi['daftarBarang'].'</td>
						      <td class="alamat text-center">'.$arraytransaksi['alamat'].'</td>
						<td class="total text-center">'.$arraytransaksi['total'].'</td>
						<td class="tanggal text-center">'.$arraytransaksi['tanggal'].'</td>
                        <td class="hapus">
                          <a href="proses/hapusTransaksi.php?idTransaksi='.$arraytransaksi['idTransaksi'].'">
                              <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                          </a>
                          </td>
                      </tr> 
                    ';
                  }
                 ?>

                   
                  </tbody>
                </table>
              </div>
            </div>
        </div>

        <!-- end of tabel transaksi -->
      
        <div id="admin" class="tab-pane fade">
          <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
              <h3 class="table-title"><strong>Tabel Admin</strong></h3>   
              <button type="button" class="btn btn-success" id="tambah-data-admin" data-toggle="modal" data-target="#form-admin">Add Admin</button>

              <!-- modal form-admin -->
              <div class="modal fade" id="form-admin" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="margin-left:150px"><strong>Tambahkan Admin</strong></h4>
                  </div>
                  <div class="modal-body">
                    <form action="proses/tambahAdmin.php" method="post" role="form">
                      <div class="form-group">
                        <label for="id-admin">ID Admin</label>
                        <input type="text" class="form-control" id="id-admin" name="idadmin">
                      </div>
                      <div class="form-group">
                        <label for="nama-admin">Nama</label>
                        <input type="text" class="form-control" id="nama-admin" name="namaadmin">
                      </div>
                      <div class="form-group">
                        <label for="email-admin">Email</label>
                        <input type="email" class="form-control" id="email-admin" name="emailadmin">
                      </div>
                      <div class="form-group">
                        <label for="password-admin">Password</label>
                        <input type="password" class="form-control" id="password-admin" name="password">
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end of modal -->

              <table class="table table-hover" id="tabel-admin">
                <thead>
                  <tr>
                    <th class="id-transaksi text-center">ID Admin</th>
                    <th class="nama-user text-center">Nama</th>
                    <th class="email-user text-center">Email</th>
                    <th class="hapus text-center"></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $conn = mysqli_connect('localhost', 'root', '', 'penjualan_gitar');
                  $queryAdmin = mysqli_query($conn, "SELECT * FROM tabel_admin");
                  while($arrayAdmin = mysqli_fetch_array($queryAdmin)){
                    echo '
                      <tr>
                        <td class="id-transaksi text-center">'.$arrayAdmin['idAdmin'].'</td>
                        <td class="nama-user text-center">'.$arrayAdmin['namaAdmin'].'</td>
                        <td class="email-user text-center">'.$arrayAdmin['email'].'</td>
                        <td class="hapus">
                          <a href="proses/hapusAdmin.php?idAdmin='.$arrayAdmin['idAdmin'].'">
                              <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                          </a>
                          </td>
                      </tr> 
                    ';
                  }
                 ?>

                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>


  </div>
  <div class="box-up" onclick="topFunction()" id="myBtn">
    <div class="btn" >
      <span><i class="glyphicon glyphicon-chevron-up"></i></span>
    </div>
    <!-- <span><i class="glyphicon glyphicon-chevron-up"></i></span> -->
  </div>

</div>
<script type="text/javascript" src="../plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="../plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
}

</script>
</body>
</html>