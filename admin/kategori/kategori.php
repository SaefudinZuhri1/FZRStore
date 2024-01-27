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
                  <a class="navbar-brand" href="dashboard.php"><img width="250" src="../../images/logo-1.png" alt="" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a href="../dashboard.php" class="nav-link">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="kategori/kategori.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="../produk/produk.php">Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pengguna <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="kategori_a.php">Detail Pembelian</a></li>
                              <li><a href="kategori_b.php">Detail Penggun</a></li>                                                    
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
                    <h3>Daftar Kategori</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Judul Page -->

        
<!-- Data Kategori -->
<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover tabel-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <?php 
            $no = 0;
            $tampil = mysqli_query($koneksi, "SELECT * FROM kategori");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>
            <tbody>
                <tr>
                    <td width="10%"><?php echo ++$no; ?></td>
                    <td width="75%"><?php echo $data['nama_kategori'] ?> </td>
                    <td class="text-center" width="15%">
                        <a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalUbah<?= $no; ?>">Edit</a>
                        <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $no; ?>">Hapus</a>
                    </td>
                </tr>

                <!-- Awal Modal Update Kategori FIX -->
                <div class="modal fade" id="modalUbah<?= $no; ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Kategori</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <form action="edit_kategori.php" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="id_kategori" aria-label="Disabled input example" value="<?=$data['id_kategori'];?>" hidden>                            
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" placeholder="Nama Kategori">                            
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Update Kategori FIX -->

                <!-- Awal Modal Hapus Kategori FIX -->
                <div class="modal fade" id="modalHapus<?= $no; ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Hapus</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="hapus_kategori.php" method="POST">
                                <input type="hidden" class="form-control" name="id_kategori" value="<?=$data['id_kategori'];?>" hidden />                            

                                <div class="modal-body">

                                <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Data Ini? <br>
                                    <span class="text-danger"><?=$data['id_kategori'];?> - <?=$data['nama_kategori'];?></span>
                                </h5>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-danger" name="bhapus">Hapus!</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Hapus Kategori FIX -->


                <?php endwhile ?>
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
        Tambah Data
        </button>

        <!-- Awal Modal Tambah Kategori FIX -->
        <div class="modal fade" id="modalTambah" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Kategori</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <form action="tambah_kategori.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nomor Kategori</label>
                            <input type="number" class="form-control" aria-label="Disabled input example" disabled>                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="bsimpan">Konfirmasi</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah Kategori FIX-->

    </div>
</div>    

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

    </body>
    </html>