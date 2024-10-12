<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek jika username sudah ada
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username sudah terdaftar!";
} else {
    // Tambah user baru ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>