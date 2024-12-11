<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    // Mengamankan input dari SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $email = mysqli_real_escape_string($conn, $email);

    // Query untuk memeriksa apakah username sudah digunakan
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan');</script>";
        echo "<script>location.href='register.php';</script>";
    } else {
        // Insert user baru ke dalam database
        $insert_user_query = "INSERT INTO users (username, password, full_name, email) 
                             VALUES ('$username', '$password', '$full_name', '$email')";

        if ($conn->query($insert_user_query) === TRUE) {
            echo "<script>alert('Registrasi berhasil');</script>";
            echo "<script>location.href='login.php';</script>";
        } else {
            echo "Error: " . $insert_user_query . "<br>" . $conn->error;
        }
    }
}
?>

