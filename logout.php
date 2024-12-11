<?php
session_start();

// Hapus semua variabel session
session_unset();

// Hapus session
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit();
?>
