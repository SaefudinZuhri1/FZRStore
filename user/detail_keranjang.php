<?php
session_start();

include '../koneksi/koneksi.php';

// Memeriksa apakah session 'keranjang_belanja' terdefinisi
if (!isset($_SESSION['keranjang_belanja'])) {
   echo "<script>alert('Keranjang belanja kosong. Silakan tambahkan produk terlebih dahulu!');</script>";
   echo "<script>window.location = 'barang.php';</script>";
   exit;
}

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");

while ($pecah = $ambil->fetch_assoc()) {
   $kategori[] = $pecah;
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
      <link rel="shortcut icon" href="../images/favicon-1.jpg" type="">
      <title>FZR Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="../css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="../css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="../css/responsive.css" rel="stylesheet" />
      <!-- Icon Bootstrap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   </head>
   <body class="sub_page">
      <div class="hero_area">

               <!-- header section strats -->
               <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="beranda.php"><img width="250" src="../images/logo-1.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="beranda.php">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Kategori <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                           <?php foreach ($kategori as $key => $value): ?>
                              <li><a href="kategori_tampil.php?idkategori=<?php echo $value['id_kategori']; ?>">
                                 <?php echo $value['nama_kategori']; ?>
                              </a></li>                             
                              <?php endforeach ?>                              
                           </ul>
                        </li>                        
                        <li class="nav-item">
                           <a class="nav-link" href="barang.php">Produk</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.php">Tentang</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="logout.php">Logout</a>
                        </li>

                        <!-- Path Cart Start -->
                        <li class="nav-item active">
                           <a class="nav-link" href="detail_keranjang.php">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                              </svg>
                           </a>
                        </li>
                        <!-- Patch Chart Selesai -->
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>

      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Keranjang Anda</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->

      <!-- Detail Keranjang Mulai -->
      <div class="container mt-5">
        <div class="row row-product">
            <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="table-info">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Sub Total</th>                     
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php 
                    $no = 1;

                    foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah):                        
                    $ambil = $koneksi->query("SELECT produk.id_produk, kategori.nama_kategori, produk.nama_produk, produk.gambar_produk, produk.harga_produk FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = '$id_produk'");
                    $pecah = $ambil->fetch_assoc();                                                           

                    $subtotal = $pecah['harga_produk']*$jumlah;                                                        

                    ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $pecah['nama_kategori']; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td><img src="../images/foto-produk/<?php echo $pecah['gambar_produk']; ?>" width="100"></td>
                        <td>Rp<?php echo number_format($pecah['harga_produk'], 0, ',', '.'); ?></td>                                               
                        <td><?php echo $jumlah ?></td> 
                        <td>Rp<?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                        <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $id_produk; ?>">
                           <i class="bi bi-trash">
                              Hapus
                           </i>
                        </button>                            
                        </td>
                    </tr> 

                     <!-- Modal Konfirmasi Penghapusan -->
                     <div class="modal fade" id="hapusModal<?php echo $id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Penghapusan Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body text-center">
                                    Apakah Anda yakin ingin menghapus produk <br> <strong class="text-danger"><?php echo $pecah['nama_produk']; ?> - Dengan Jumlah Produk Di Keranjang <?php echo $jumlah; ?></strong> dari keranjang?
                                 </div>
                                 <div class="modal-footer">
                                 <form method="post" action="hapus_keranjang.php?id_produk=<?php echo $id_produk; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" name="khapus">Ya, Hapus</button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                 </form>
                                 </div>
                           </div>
                        </div>
                     </div>
                    <?php endforeach ?>              
                </tbody>
            </table>

            <div class="row row-product mt-3">
               <div class="col">
                  <div class="table">
                     <tr>                     
                        <td class="text-left"><a href="barang.php" class="btn btn-sm btn-danger">Kembali Belanja</a></td>
                        <td class="text-right"><a href="checkout.php" class="btn btn-sm btn-success">Checkout</a></td>                    
                     </tr>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Keranjang Selesai -->

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
                     <a href="beranda.php">Faisal Purnama | Saefudin Zuhri | Retta Cendana</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->

      <!-- jQery -->
      <script src="../js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="../js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="../js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="../js/custom.js"></script>
      <!-- Detail Produk -->
      <script src="../js/detail_produk.js"></script>
      <!-- Icon -->
      <script src="https://kit.fontawesome.com/c9c30bf4b1.js" crossorigin="anonymous"></script>
   </body>
</html>