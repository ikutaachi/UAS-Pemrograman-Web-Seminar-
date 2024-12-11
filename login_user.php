<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai User</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Tambahkan gaya untuk latar belakang */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('user.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.85); /* Transparansi */
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #2c3e50;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: #3498db;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container button:hover {
            background: #2980b9;
        }

        .login-container p {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #2c3e50;
        }

        .login-container a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login_user_process.php" method="POST">
            <h2>LOGIN SEBAGAI PESERTA</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Belum punya akun? <a href="register_user.php">Register</a></p>
        </form>
    </div>
</body>
</html>
