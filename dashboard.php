<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Query untuk mengambil data event dari database
$query = "SELECT * FROM tiket";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
         <img src="ems-logo.png" alt="EMS Logo" width=75px style="border-radius: 50%;"> <!-- Ganti dengan logo Anda -->
        </div>
        <ul>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="event.php">Event</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="event-list">
            <h2>Event Tersimpan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tema Event</th>
                        <th>Tanggal</th>
                        <th>No Tagihan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['tema_event']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['no_tagihan']; ?></td>
                        <td>Rp <?php echo $row['total_harga']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
