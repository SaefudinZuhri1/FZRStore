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
<title>Famms - Fashion HTML Template</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="../produk/produk.php">Produk</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pengguna <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../pengguna/pembelian.php">Detail Pembelian</a></li>
                    <li><a href="../pengguna/pengguna.php">Detail Pengguna</a></li>
                </ul>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="daftar_admin.php">Admin</a>
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
                    <h3>Administrator</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Judul Page -->

<!-- Data Kategori -->
<section class="why_section layout_padding">
    <div class="card shadow bg-white">
        <div class="card-body">
            <table class="table table-bordered table-hover tabel-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center" hidden>Password</th>                        
                    </tr>
                </thead>

                <?php 
                $no = 0;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_admin");
                while ($data = mysqli_fetch_array($tampil)) :
                ?>

                <tbody>
                <tr>
                    <td width="90"><?php echo ++$no; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['username']; ?></td>                     
                    <td hidden><?php echo $data['password']; ?></td>
                    <td class="text-center" width="220">                        
                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalUbah<?= $no; ?>">Lihat</a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?= $no; ?>">Hapus</a>
                    </td>
                </tr>

                <!-- Awal Modal Lihat Data Admin FIX -->
                <div class="modal fade" id="modalUbah<?= $no; ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Administrator</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor</label>
                                            <input type="number" class="form-control" name="id_admin" value="<?= $data['id_admin'] ?>" aria-label="Disabled input example" disabled>                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Lengkap" disabled>                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" placeholder="Username" disabled>                            
                                        </div>                                        
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" name="no_tlpn" value="<?= $data['no_tlpn'] ?>" placeholder="Nomor Telepon" disabled>                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" placeholder="Email" disabled>                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" placeholder="Alamat" disabled>                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>                                            
                                        </div>
                                    </div>
                                </form>                            
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Lihat Data Admin FIX --> 
                
                <!-- Awal Modal Hapus Data FIX -->
                <div class="modal fade" id="modalHapus<?= $no; ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Hapus</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="hapus_admin.php" method="POST">
                                <input type="hidden" class="form-control" name="id_admin" value="<?=$data['id_admin'];?>" hidden />                            

                                <div class="modal-body">

                                <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Data Ini? <br>
                                    <span class="text-danger"><?=$data['username'];?> - <?=$data['email'];?></span>
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
                <!-- Akhir Modal Hapus Data FIX -->

                <?php endwhile ?>
                </tbody>
            </table>

            <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
        Tambah Admin
        </button>

        <!-- Awal Modal Tambah Admin FIX -->
        <div class="modal fade" id="modalTambah" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Pendaftaran Admin</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <form action="tambah_admin.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nomor</label>
                            <input type="number" class="form-control" name="id_admin" aria-label="Disabled input example" disabled>                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="no_tlpn" placeholder="Nomor Telepon">                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat">                            
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
        <!-- Akhir Modal Tambah Admin FIX-->

        <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="full">
                     <div class="logo_footer">
                        <a href="#"><img width="220" src="../../images/logo-1.png" alt="#" /></a>
                     </div>
                     <div class="information_f">
                        <p><strong>ADDRESS:</strong> Jl. Soekarno Hatta No 82</p>
                        <p><strong>TELEPHONE:</strong> +6281220396052</p>
                        <p><strong>EMAIL:</strong> fzrstore@gmail.com</p>
                     </div>
                  </div>
               </div>
                 
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Kabar Baru</h3>
                        <div class="information_f">
                        <p>Berlangganan Sekarang Untuk Mendapatkan Diskon Pembelian Pertama Anda!</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->


        </div>
    </div>
</section>        

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