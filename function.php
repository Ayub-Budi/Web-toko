<?php
$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "tokoayub";

// menciptakan koneksi
$conn = mysqli_connect($servername, $usernamedb, $passworddb, $dbname);

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows =[];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[]=$row;
  }
  return $rows;
}

function tambah($data1){
  global $conn;
  $nama = htmlspecialchars($data1["nama"]);
  $harga = htmlspecialchars($data1["harga"]);
  $stok = htmlspecialchars($data1["stok"]);
  $foto = htmlspecialchars($data1["foto"]);

  $query = "INSERT INTO barang
                VALUES
                ('', '$nama', $harga, $stok, '$foto') 
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function edit($data1){
  global $conn;
  $id = $data1["id"];
  $nama = htmlspecialchars($data1["nama"]);
  $harga = htmlspecialchars($data1["harga"]);
  $stok = htmlspecialchars($data1["stok"]);
  $foto = htmlspecialchars($data1["foto"]);

  $query = "UPDATE barang SET
                nama = '$nama',
                harga = $harga,
                stok = $stok,
                foto = '$foto'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile =$_FILES['foto'] ['name'];
  $ukuranFile = $_FILES['foto'] ['size'];
  $errors = $_FILES['foto'] ['error'];
  $tmpName = $_FILES['foto'] ['tmp_name'];

  // cek foto sudah di upload
  if ($errors === 4) {
    echo "
    <script>
        alert('gambar berasil di upload');
    </script>
    ";
  }

  // cek apa yang di upload
  $ekstensiFotoValid = ['jpg','png','jpeg'];
  $ekstensiFoto = explode('.',$namaFile);
  $ekstensiFoto = strtolower(end($ekstensiFoto));
  if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
      $errors['foto'];
   }

  //lolos pengecekan
  move_uploaded_file($tmpName, 'gambar/'.$namaFile);

  return $namaFile;
}



function registrasi($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  
  //cek username sudah ada atau belum
  $usr = mysqli_query($conn, "SELECT username FROM usr WHERE username = '$username'");

  if (mysqli_fetch_assoc($usr)) {
    echo "<script>
    alert('username sudah ada');
    </script>";
    return false;
  }
  //cek konfrimasi passworld
  if($password !== $password2){
    echo "<script>
    alert('passworld tidak sesuai');
    </script>";
    return false;
  }
  
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //menambahkan user baru ke data base
  mysqli_query($conn, "INSERT INTO usr VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}
?>