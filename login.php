<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk cek user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login sukses, set session
    session_start();
    $_SESSION['username'] = $username;
    header("Location: home.html");
} else {
    echo "Username atau password salah!";
}
?>