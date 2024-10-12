<?php
include 'db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// Insert ke tabel merchandise
$sql = "INSERT INTO merchandise (name, description, price) VALUES ('$name', '$description', '$price')";
if ($conn->query($sql) === TRUE) {
    echo "Barang baru berhasil ditambahkan!";
    header("Location: home.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>