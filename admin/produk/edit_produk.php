<?php

include '../../koneksi/koneksi.php';
include '../../koneksi/function.php';

// Mengambil id_produk
$id_produk = $_GET['id_produk'];


$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");
$edit = $ambil->fetch_assoc();
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

    <body class="sub_page">
        <div class="hero_area">

        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="../dashboard.php"><img width="250" src="../../images/logo-1.png" alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../dashboard.php">Beranda <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Kategori <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="kategori_a.php">Slip-On</a></li>
                                <li><a href="kategori_b.php">Oxford</a></li>
                                <li><a href="kategori_c.php">Safety Boot</a></li>
                                <li><a href="kategori_d.php">Fashion Boot</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../tentang.php">Tentang</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Bergabung Sekarang!<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="daftar.php" class="nav-item active">Daftar</a></li>
                                <li><a href="masuk_user.php">Masuk</a></li>                                
                            </ul>
                            </li>
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
                        <h3>Ubah Data Produk</h3>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- end inner page section -->
        
        <section class="why_section layout_padding">
            <div class="card shadow bg-white">  
                
            <?php 
            $ambil = $koneksi->query("SELECT * FROM kategori");

            $kategori = array();
            $ambil = $koneksi->query("SELECT * FROM kategori");
            while ($pecah = $ambil->fetch_assoc()) {
                $kategori[] = $pecah;
            }

            $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");
            $edit = $ambil->fetch_assoc();

            ?>

                <form action="edit_produk.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_produk" value="<?php echo $data['id_produk']; ?>">                                                            
                        <div class="modal-body">                                                                    
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <select name="nama_kategori" class="form-control" required>
                                    
                                    <option value="<?php echo $edit['id_kategori']; ?>">
                                        <?php echo $edit['nama_kategori']; ?></option>
                                                                                                                                                                                             
                                        <?php foreach ($kategori as $key => $value): ?>
                                            <option value="<?php echo $value['id_kategori']; ?>">
                                                <?php echo $value['nama_kategori']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </option>

                                </select>
                            </div>                
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" value="<?php echo $edit['nama_produk']; ?>" required>                            
                            </div>
                            <div class="mb-2">
                                        <label class="form-label">Gambar Produk</label>
                                        <div class="col-sm-20">
                                            <div class="input-foto">
                                                <img src="../../images/foto-produk/<?php echo $edit['gambar_produk']; ?>" width="200">
                                                <input class="form-control" name="foto[]" type="file" placeholder="Foto Produk">
                                            </div>
                                            <span class="btn btn-sm btn-primary btn-tambah">
                                            <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga Produk</label>
                                        <input type="text" class="form-control" name="harga_produk" value="<?php echo $edit['harga_produk']; ?>" required>                            
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deksripsi Produk</label>
                                        <input type="text" class="form-control" name="desk_produk" value="<?php echo $edit['desk_produk']; ?>"  required>                            
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stok Produk</label>
                                        <input type="text" class="form-control" name="stok_produk" value="<?php echo $edit['stok_produk']; ?>" required>                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                                    </div>
                                </div>
                        </form>

                        <?php

                        if (isset($_POST['ubah'])) {
                            $id_produk_foto = ['foto'];
                            $nama_kategori = $_POST['nama_kategori'];
                            $nama = $_POST['nama_produk'];                            
                            $harga = $_POST['harga_produk'];
                            $desk = $_POST['desk_produk'];
                            $stok = $_POST['stok_produk'];

                            $namafoto = $_FILES['foto']['name'];
                            $lokasi_foto_produk = $_FILES['foto']['tmp_name'];
                            
                            // Jika Foto Dirubah
                            if (!empty($lokasifoto)) {                            
                                // Jika hanya satu file diunggah
                                move_uploaded_file($lokasi_foto_produk[0], "../../images/foto-produk/" . $nama_produk_foto[0]);

                                $koneksi->query("UPDATE produk SET id_kategori = '$nama_kategori', nama_produk = '$nama', gambar_produk = '$namafoto', harga_produk = '$harga', desk_produk = '$desk', stok_produk = '$stok' WHERE id_produk = '$id_produk'");
                            }

                            // Jika Foto Tidak Diubah
                            else {
                                $koneksi->query("UPDATE produk SET id_kategori = '$nama_kategori', nama_produk = '$nama', harga_produk = '$harga', desk_produk = '$desk', stok_produk = '$stok'");                                                       
                            }
                            
                            $nama_produk_foto = $_FILES['foto']['name'];
                            $lokasi_foto_produk = $_FILES['foto']['tmp_name'];

                            // Jika hanya satu file diunggah
                            for ($i = 0; $i < count($nama_produk_foto); $i++) {
                                $nama_foto = $nama_produk_foto[$i];
                                move_uploaded_file($lokasi_foto_produk[$i], "../../images/foto-produk/" . $nama_foto);
                            
                                // Menambahkan record ke dalam tabel produk_foto
                                $koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) VALUES ('$id_produk', '$nama_foto')");
                            }    
                            echo "<script>
                            alert('Data Berhasil Diubah');
                            window.location = 'produk.php';
                            </script>";                    
                        }


                        ?>

                    </div>
                </div>
            </div>
        <!-- jQery -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="../../js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="../../js/bootstrap.js"></script>
        <!-- Icon -->
        <script src="https://kit.fontawesome.com/ba10a3efc2.js" crossorigin="anonymous"></script>
        <!-- custom js -->
        <script src="../../js/custom.js"></script>

    </body>
</html>