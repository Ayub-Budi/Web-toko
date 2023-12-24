<?php
session_start();

if(isset($_SESSION["login"])){
   header("Location: sukses.php");
    exit;
}

require 'function.php';
if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM usr WHERE username = '$username'");
    //,mengecek username
    if(mysqli_num_rows($user) === 1){

        //cek passworld
        $row = mysqli_fetch_assoc($user);
        if (password_verify($password, $row["password"])) {
            //set sesion
            $_SESSION["login"] = true;
            echo "
            <script>
                alert('data berasil di tambahkan');
                document.location.href = 'sukses.php';
            </script>
            ";
            exit;
        }
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
    <div class="hal2">
    <h2 class="f">Silahkan Login</h2>

        <img src="gambar/logo.jpg" alt="" class="img">
        <hr>
        <label for="username">
                Username:<br><input type="text" name="username">
        </label>
        <br>
        <label for="password">
                Password:<br><input type="Password" name="password">
        </label>
        </form>
        <br>
        <hr>
        <button type="submit" name="login" id="login">Login</button><br>
        <a href="registrsi.php">membuat user baru</a>
        </div>
        <footer>
            &copy;2022 toko ayub
        </footer>
    </div>
</body>
</html>