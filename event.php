<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Ambil data tiket dari database
$query = "SELECT * FROM tiket";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .tambah-event-btn {
            margin-top: 10px;
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
            <div class="search">
                <input type="text" placeholder="Pencarian">
                <button>Search</button>
            </div>
        </div>
        <div class="event-list">
            <h2>Event</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tema Event</th>
                        <th>Tanggal</th>
                        <th>No Tagihan</th>
                        <th>Status Bayar</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['tema_event']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['no_tagihan']; ?></td>
                        <td><?php echo $row['status_bayar']; ?></td>
                        <td>Rp <?php echo $row['total_harga']; ?></td>
                        <td>
                            <a href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="hapus_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus event ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="tambah_event.php" class="btn tambah-event-btn">Tambah Event Baru</a>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
