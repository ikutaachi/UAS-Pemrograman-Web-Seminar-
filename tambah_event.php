<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tema_event = $_POST['tema_event'];
    $tanggal = $_POST['tanggal'];
    $no_tagihan = $_POST['no_tagihan'];
    $status_bayar = $_POST['status_bayar'];
    $total_harga = $_POST['total_harga'];

    // Query untuk menambahkan event baru ke database
    $insert_query = "INSERT INTO tiket (tema_event, tanggal, no_tagihan, status_bayar, total_harga) 
                     VALUES ('$tema_event', '$tanggal', '$no_tagihan', '$status_bayar', '$total_harga')";

    if ($conn->query($insert_query) === TRUE) {
        echo "<script>alert('Event berhasil ditambahkan');</script>";
        echo "<script>location.href='event.php';</script>";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .form-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container input[type="text"],
        .form-container button {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
          <img src="ems-logo.png" alt="EMS Logo" width=75px style="border-radius: 50%;"> <!-- Ganti dengan logo Anda -->
        </div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="event.php">Event</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h2>Tambah Event</h2>
        </div>
        <div class="form-container">
            <form action="tambah_event.php" method="POST">
                <input type="text" name="tema_event" placeholder="Tema Event" required>
                <input type="text" name="tanggal" placeholder="Tanggal" required>
                <input type="text" name="no_tagihan" placeholder="No Tagihan" required>
                <input type="text" name="status_bayar" placeholder="Status Bayar" required>
                <input type="text" name="total_harga" placeholder="Total Harga" required>
                <button type="submit">Tambah Event</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
