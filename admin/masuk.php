<?php
session_start(); // Panggil session_start() di awal halaman
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
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />
    </head>

    <body class="sub_page">
        <div class="hero_area">

        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="../index.php"><img width="250" src="../images/logo-1.png" alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Beranda <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Kategori <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="kategori_1.php">Slip-On</a></li>
                                <li><a href="kategori_2.php">Oxford</a></li>
                                <li><a href="kategori_3.php">Safety Boot</a></li>
                                <li><a href="kategori_4.php">Boot Fashion</a></li>                              
                            </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../produk.php">Produk</a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="../tentang.php">Tentang</a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Bergabung Sekarang!<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../user/daftar.php" class="nav-item active">Daftar</a></li>
                                <li><a href="../user/masuk_user.php">Masuk</a></li>
                                <li><a href="masuk.php">Masuk Sebagai Admin</a></li>
                            </ul>
                            </li>

                            <!-- Path Cart Start -->
                            <li class="nav-item">
                            <a class="nav-link" href="../user/masuk_user.php">
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
                        <h3>Masuk Sekarang!</h3>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- end inner page section -->
        
        <!-- why section -->
        <section class="why_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="full">
                            <form action="" method="POST">
                                <fieldset>
                                    <input type="text" placeholder="Username" name="username" required />
                                    <input type="password" placeholder="Password" name="password" />
                                    <input type="submit" value="Submit" name="submit_login" />
                                    <p class="text-center m-3">Lupa Password? <a href="ubah_pass.php">Ubah Password</a></p>
                                </fieldset>
                            </form>

                            <?php                                                            
                                if (isset($_POST['submit_login'])) {
                                    include '../koneksi/koneksi.php';
                                
                                    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
                                    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
                                
                                    // Gunakan prepared statements untuk mencegah SQL injection
                                    $stmt = mysqli_prepare($koneksi, "SELECT * FROM tb_admin WHERE username = ? AND password = MD5(?)");
                                    mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
                                    mysqli_stmt_execute($stmt);
                                    $hasil = mysqli_stmt_get_result($stmt);
                                
                                    if ($hasil) {
                                        if (mysqli_num_rows($hasil) > 0) {
                                            $d = mysqli_fetch_object($hasil);
                                            $_SESSION['status_login_admin'] = true;
                                            $_SESSION['a_global'] = $d;
                                            $_SESSION['id'] = $d->id_admin;
                                            echo "<script>
                                            alert('Berhasil Masuk!');
                                            </script>";
                                            echo '<script>window.location="dashboard.php"</script>';
                                        } else {
                                            echo '<script>alert("Username atau Password Anda Salah!")</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Error: ' . mysqli_error($koneksi) . '")</script>';
                                    }
                                }
                            ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end why section -->

    
        <!-- arrival section -->
        <section class="arrival_section">
            <div class="container">
                <div class="box">
                <div class="arrival_bg_box">
                    <img src="../images/arrival-bg-1.png" alt="">
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto">
                        <div class="heading_container remove_line_bt">
                            <h2>
                            #NewArrivals
                            </h2>
                        </div>
                        <p style="margin-top: 20px;margin-bottom: 30px;">
                            Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                        </p>
                        <a href="">
                        Shop Now
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- end arrival section -->

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
        <script src="../js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="../js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="../js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="../js/custom.js"></script>
    </body>
</html>