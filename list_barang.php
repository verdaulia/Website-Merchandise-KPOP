<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';  // Menghubungkan ke database

// Ambil data dari tabel merchandise
$sql = "SELECT * FROM merchandise";
$result = $conn->query($sql);

// Cek apakah query berhasil
if ($result === false) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Merchandise</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Daftar Barang Merchandise</h2>
    <a href="add.html">Tambah Barang Baru</a> | <a href="logout.php">Logout</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>

        <?php
        // Tampilkan data barang jika ada
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada barang yang tersedia</td></tr>";
        }

        $conn->close();  // Tutup koneksi database
        ?>
    </table>

    <a href="home.html">Kembali ke Home</a>
</body>
</html>