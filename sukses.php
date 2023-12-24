<?php
require 'function.php';
session_start();

$barang = query("SELECT * FROM barang");


if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
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
                    <li><a href="sukses.php" class="current">Beranda</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="logout.php">Kembali</a></li>
                </ul>
            </nav>
        </header>
        <section class="utama">

        <?php foreach($barang as $row) :?>
            <article>
                <figure>
                    <img src="gambar/<?= $row["foto"]; ?>" alt="" style="width: 300px; height: 200px;">
                    <figcaption><?= $row["nama"]; ?></figcaption>
                </figure>
                    <hgroup>
                        <h2><?= $row["nama"]; ?></h2>
                        <h3>Rp.<?= $row["harga"]; ?></h3>
                    </hgroup>
                    stok : <?= $row["stok"]; ?><br>
                    <a href="">Beli</a>
                </article>
        <?php endforeach; ?>

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