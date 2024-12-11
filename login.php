<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Before Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Gaya estetik */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('dashboard.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            max-width: 800px;
            background: rgba(0, 0, 0, 0.7); /* Transparansi */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .container h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .container p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .btn-group {
            display: flex;
            flex-direction: column; /* Vertikal */
            gap: 15px;
            justify-content: center;
        }
        .btn {
            text-decoration: none;
            background: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .btn:hover {
            background: #c0392b;
            transform: scale(1.05);
        }
        .btn-admin {
            background: #2ecc71;
        }
        .btn-admin:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Event</h1>
        <p>Explore the features by logging into your account.</p>
        <div class="btn-group">
            <a href="login_user.php" class="btn">Login Peserta</a>
            <a href="login_admin.php" class="btn btn-admin">Login Admin</a>
            <a href="register.php" class="btn">Register</a>
        </div>
    </div>
</body>
</html>
