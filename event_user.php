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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .event-list h2 {
            margin-bottom: 20px;
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
            <li><a href="event_user.php" class="active">Event</a></li>
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
                        <th>Registrasi</th>
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
                            <a href="daftar_seminar.php?id=<?php echo $row['id']; ?>">Daftar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
