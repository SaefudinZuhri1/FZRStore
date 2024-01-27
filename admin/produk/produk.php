<?php 
include '../../koneksi/koneksi.php';

session_start();

if (!isset($_SESSION["status_login_admin"])) {
   header("Location: ../masuk.php");
   exit();
}

?>
    
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="../../images/favicon-1.jpg" type="">
      <title>FZR STORE</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="../../css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="../../css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="../../css/responsive.css" rel="stylesheet" />
   </head>

<body>
<div class="hero_area">

<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="../dashboard.php"><img width="250" src="../../images/logo-1.png" alt="" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../dashboard.php" class="nav-link">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kategori/kategori.php">Kategori</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pengguna <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../pengguna/pembelian.php">Detail Pembelian</a></li>
                    <li><a href="../pengguna/pengguna.php">Detail Pengguna</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrator/daftar_admin.php">Admin</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="../keluar.php">Logout</a>
                </li>                                               
            </ul>
        </div>
        </nav>
    </div>
</header>
<!-- end header section -->

<!-- Judul Page -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Daftar Produk</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Judul Page -->

<!-- Data Produk -->
<section class="why_section layout_padding">
    <div class="card shadow bg-white">
        <div class="card-body">
            <table class="table table-bordered table-hover tabel-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Gambar Produk</th>
                        <th class="text-center">Harga Produk</th>
                        <th class="text-center">Deskripsi Produk</th>
                        <th class="text-center">Stok Produk</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <?php 
                $no = 0;
                
                $tampil = mysqli_query($koneksi, "SELECT produk.*, kategori.nama_kategori FROM produk INNER JOIN kategori on produk.id_kategori = kategori.id_kategori");
                while ($data = mysqli_fetch_array($tampil)) :
                    
                ?>

                <tbody>                
                <tr>
                    <td width="90"><?php echo ++$no; ?></td>                   
                    <td><?php echo $data['nama_kategori']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><img src="../../images/foto-produk/<?php echo $data['gambar_produk']; ?>" width="150" /></td>
                    <td>Rp<?php echo $data['harga_produk']; ?></td>
                    <td><?php echo $data['desk_produk']; ?></td>
                    <td><?php echo $data['stok_produk']; ?></td>
                    <td class="text-center" width="220">
                        <a href="edit_produk.php?id_produk=<?= $data['id_produk']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $no; ?>">Hapus</a>
                    </td>
                </tr>

            <!-- Awal Modal Hapus Produk  -->
            <div class="modal fade" id="modalHapus<?= $no; ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Hapus Data Produk</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>

                        <form action="hapus_produk.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id_produk" value="<?=$data['id_produk'];?>" hidden />
                                <div class="modal-body">

                                    <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Data Ini? <br>
                                        <span class="text-danger"><?=$data['id_produk'];?> - <?=$data['nama_produk'];?></span>
                                    </h5>

                                </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger" name="bhapus">Hapus!</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Hapus Produk -->


            <!-- Awal Edit Produk -->
            
            <?php

            $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = '$data[id_produk]'");
            $edit = $ambil->fetch_assoc();

            ?>
            
            <!-- Akhir Edit Produk -->

                <?php endwhile ?>
                </tbody>
            </table>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            Tambah Data
            </button>


            <!-- Awal Modal Tambah Produk FIX -->
            <div class="modal fade" id="modalTambah" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Produk</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>

                                
                        <?php 
                        $kategori = array();
                        $ambil = $koneksi->query("SELECT * FROM kategori");
                        while ($pecah = $ambil->fetch_assoc()) {
                            $kategori[] = $pecah;
                        }
                        ?>

                        <form action="tambah_produk.php" method="POST" enctype="multipart/form-data">
                            <input type="number" class="form-control" name="id_produk" hidden>                                                        
                                <div class="modal-body">                                
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kategori</label>
                                        <select name="nama_kategori" class="form-control" required>
                                            <option selected disabled>Pilih Nama Kategori</option>                                        
                                            <?php foreach ($kategori as $key => $value): ?>                                 
                                            <option value="<?php echo $value['id_kategori']; ?>">
                                                <?php echo $value['nama_kategori']; ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required>                            
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Gambar Produk</label>
                                        <div class="col-sm-20">
                                            <div class="input-foto">
                                                <input class="form-control" name="foto[]" type="file" placeholder="Foto Produk" required>
                                            </div>
                                            <span class="btn btn-sm btn-primary btn-tambah">
                                            <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga Produk</label>
                                        <input type="text" class="form-control" name="harga_produk" placeholder="Harga Produk" required>                            
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deksripsi Produk</label>
                                        <input type="text" class="form-control" name="desk_produk" placeholder="Deksripsi Produk" required>                            
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stok Produk</label>
                                        <input type="text" class="form-control" name="stok_produk" placeholder="Stok Produk" required>                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Akhir Modal Tambah Produk FIX-->
        </div>
    </div>        
</section>

<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>
                        Reach at..
                    </h4>
                <div class="contact_link_box">
                    <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Jl. Soekarno Hatta No 82
                            </span>
                    </a>

                    <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                            +6281220396052
                            </span>
                    </a>

                    <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        fzrstore@gmail.com
                        </span>
                    </a>
                </div>
                </div>
            </div>

               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="beranda.php" class="footer-logo">
                     FZR Store
                     </a>                                          
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="../dashboard.php">Faisal Purnama | Saefudin Zuhri | Retta Cendana</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->


        <!-- jQery -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="../../js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="../../js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="../../js/custom.js"></script>
        <!-- Icon -->
        <script src="https://kit.fontawesome.com/ba10a3efc2.js" crossorigin="anonymous"></script>
        <!-- Button Tambah -->
        
        <script>
            $(document).ready(function() {
                $(".btn-tambah").on("click", function(){
                    $(".input-foto").append("<input class='form-control' name='foto[]' type='file' placeholder='Foto Produk'>");
                })
            })
        </script>

    </body>
    </html>