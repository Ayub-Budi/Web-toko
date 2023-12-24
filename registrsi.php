<?php
require 'function.php';
if (isset($_POST["regrister"])) {
    
    // mengecek konfrimasi password
    if (registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru telah di tambahkan');
                </script>";
        header("Location: login.php");
    } else{
        echo mysqli_error($conn);
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
    <form action="" method="post">
    <header>
        <h1>Selamat Datang Di Toko Ayub</h1>
    </header>
        <div class="f"><h2>Membuat Username Baru di Toko Ayub</h2></div>
        <div class="hal2">
            <h2>Masukan Data</h2>
            <label for="username">
                    Username:<br><input type="text" name="username">
            </label>
            <br>
            <label for="password">
                    Password:<br><input type="Password" name="password">
            </label>
            <br>
            <label for="password2">
                    Konfrimasi Password:<br><input type="Password" name="password2">
            </label>
            <hr>
            <br>
            <button type="submit" name="regrister">Daftar</button><br>
            <a href="login.php">Kembali login</a>
        </div>
        <footer>
            &copy;2022 toko ayub
        </footer>
    </div>
</body>
</html>