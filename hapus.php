<?php 
require 'function.php';
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('berhasil hapus');
        document.location.href = 'sukses.php';
    </script>
    ";

}else{
    echo "
    <script>
        alert('gagal hapus');
        document.location.href = 'sukses.php';
    </script>
    ";
}

?>