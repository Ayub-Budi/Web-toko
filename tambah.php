<?php
require 'function.php';
if(isset($_POST["tambah"])){

    //cek berasil apa tidak

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berasil di tambahkan');
            document.location.href = 'sukses.php';
        </script>
        ";

    }else{
        echo "
        <script>
            alert('data gagal di tambahkan');
            document.location.href = 'sukses.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Toko Ayub</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Selamat Datang Di Toko Ayub</h1>
            <nav>
                <ul>
                    <li><a href="sukses.php">Beranda</a></li>
                    <li><a href="admin.php" class="current">Admin</a></li>
                    <li><a href="logout.php">Kembali</a></li>
                </ul>
            </nav>
        </header>
        <section class="utama">
        <h2>Tambah Barang</h2>
        <form action="" method="post">
        <label for="nama">
                    Nama Barang:<br><input type="text" name="nama">
            </label>
            <br>
            <label for="harga">
                    Harga Barang:<br><input type="text" name="harga">
            </label>
            <br>
            <label for="Stok">
                    Stok:<br><input type="text" name="stok">
            </label>
            <br>
            <label for="foto">
                    Foto:<br><input type="file" name="foto" id="foto">
            </label>
            <br>
            <button type="submit" name="tambah" id="tambah">Tambah Barang</button><br>
            </form>
        </section>
        <aside>
            <section class="contact-details">
                <h2>Kontak</h2>
                <p>Toko Ayub <br>wa: 0811-222-333-444</p>
            </section>
        </aside>
        <footer>
            &copy;2022 toko ayub
        </footer>
    </div>
</body>
</html>