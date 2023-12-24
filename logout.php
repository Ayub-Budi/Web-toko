<?php
session_start();
$_SERVER = [];
session_unset();
session_destroy();

header("location: login.php");
exit;
?>