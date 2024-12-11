<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Memeriksa apakah parameter id disertakan dalam URL
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || 
    !isset($_GET['nama']) || !isset($_GET['email']) || !isset($_GET['telepon'])) {
    header("Location: event_user.php");
    exit();
}

$id = $_GET['id'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$telepon = $_GET['telepon'];

// Query untuk mendapatkan status_bayar dan tema_event dari tabel tiket
$query = "SELECT tiket.status_bayar, tiket.tema_event 
          FROM tiket 
          INNER JOIN pendaftar_seminar ON tiket.id = pendaftar_seminar.id_tiket 
          WHERE tiket.id = $id LIMIT 1";
$result = $conn->query($query);

// Memastikan data ditemukan
if ($result->num_rows <= 0) {
    header("Location: event_user.php");
    exit();
}

$row = $result->fetch_assoc();
$status_bayar = $row['status_bayar'];
$tema_event = $row['tema_event'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pendaftaran</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .cetak-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cetak-container h2 {
            margin-bottom: 20px;
        }

        .cetak-container p {
            margin: 10px 0;
        }

        .cetak-container button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .cetak-container button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="cetak-container">
        <h2>Detail Pendaftaran Seminar</h2>
        <p><strong></strong> <?php echo htmlspecialchars($tema_event); ?></p>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Status Bayar:</strong> <?php echo htmlspecialchars($status_bayar); ?></p>
        <button onclick="window.print()">Cetak</button>
    </div>
</body>
</html>

<?php $conn->close(); ?>
