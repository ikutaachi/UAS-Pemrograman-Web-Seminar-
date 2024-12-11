<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus event berdasarkan ID
    $delete_query = "DELETE FROM tiket WHERE id='$id'";

    if ($conn->query($delete_query) === TRUE) {
        echo "<script>alert('Event berhasil dihapus');</script>";
        echo "<script>location.href='event.php';</script>";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}
?>

