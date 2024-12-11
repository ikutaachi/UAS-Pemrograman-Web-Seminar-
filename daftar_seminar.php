<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Memeriksa apakah parameter id disertakan dalam URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: event_user.php");
    exit();
}

$id = $_GET['id'];

//Query untuk mengambil detail seminar berdasarkan id
$query = "SELECT * FROM tiket WHERE id = $id";
$result = $conn->query($query);

// Memastikan data ditemukan
if ($result->num_rows <= 0) {
    header("Location: event_user.php");
    exit();
}

$row = $result->fetch_assoc();

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Lakukan validasi data jika diperlukan

    // Simpan data orang yang mendaftar ke database (contoh sederhana)
    $insert_query = "INSERT INTO pendaftar_seminar (nama, email, telepon, id_tiket) 
                    VALUES ('$nama', '$email', '$telepon', $id)";

    if ($conn->query($insert_query) === TRUE) {
        header("Location: cetak.php?id=$id&nama=$nama&email=$email&telepon=$telepon");
        exit();
    } else {
        echo "<script>alert('Error: " . $insert_query . "<br>" . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Seminar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #3a3f47;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar .logo {
            margin: 20px 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
        }

        .sidebar ul li {
            width: 100%;
        }

        .sidebar ul li a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            text-align: center;
            background: #3a3f47;
            border-bottom: 1px solid #444;
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background: #575d69;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search {
            display: flex;
            align-items: center;
        }

        .search input {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search button {
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .search button:hover {
            background: #0056b3;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .detail-seminar {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .registration-form {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            margin-bottom: 20px;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="tel"],
        .registration-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .registration-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .registration-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
         <img src="ems-logo.png" alt="EMS Logo" width=75px style="border-radius: 50%;"> <!-- Ganti dengan logo Anda -->
        </div>
        <ul>
            <li><a href="dashboard_user.php">Dashboard</a></li>
            <li><a href="event_user.php">Event</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h2>Detail Seminar</h2>
        </div>
        <div class="detail-seminar">
            <h3><?php echo $row['tema_event']; ?></h3>
            <p><strong>No Tagihan:</strong> <?php echo $row['no_tagihan']; ?></p>
            <p><strong>Status Bayar:</strong> <?php echo $row['status_bayar']; ?></p>
            <p><strong>Total Harga:</strong> Rp <?php echo $row['total_harga']; ?></p>
            <!-- Tambahkan detail lainnya sesuai kebutuhan -->
        </div>
        
        <!-- Formulir untuk mengisi data orang yang mendaftar -->
        <div class="registration-form">
            <h2>Formulir Pendaftaran</h2>
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="tel" name="telepon" placeholder="Telepon" required><br><br>
                <button type="submit">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
