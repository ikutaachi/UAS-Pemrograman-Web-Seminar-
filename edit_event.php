<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data event berdasarkan ID
    $select_query = "SELECT * FROM tiket WHERE id='$id'";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Event tidak ditemukan.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tema_event = $_POST['tema_event'];
    $tanggal = $_POST['tanggal'];
    $no_tagihan = $_POST['no_tagihan'];
    $status_bayar = $_POST['status_bayar'];
    $total_harga = $_POST['total_harga'];

    // Query untuk update data event
    $update_query = "UPDATE tiket SET tema_event='$tema_event', tanggal='$tanggal', no_tagihan='$no_tagihan', 
                     status_bayar='$status_bayar', total_harga='$total_harga' WHERE id='$id'";

    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Event berhasil diupdate');</script>";
        echo "<script>location.href='event.php';</script>";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
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
            <li><a href="event.php" class="active">Event</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h2>Edit Event</h2>
        </div>
        <div class="form-container">
            <form action="edit_event.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="tema_event" placeholder="Tema Event" value="<?php echo $row['tema_event']; ?>" required>
                <input type="text" name="tanggal" placeholder="Tanggal" value="<?php echo $row['tanggal']; ?>" required>
                <input type="text" name="no_tagihan" placeholder="No Tagihan" value="<?php echo $row['no_tagihan']; ?>" required>
                <input type="text" name="status_bayar" placeholder="Status Bayar" value="<?php echo $row['status_bayar']; ?>" required>
                <input type="text" name="total_harga" placeholder="Total Harga" value="Rp <?php echo $row['total_harga']; ?>" required>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
