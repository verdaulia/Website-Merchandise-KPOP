<?php
include 'db.php';

$sql = "SELECT * FROM merchandise";
$result = $conn->query($sql);

$merchandise = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $merchandise[] = $row;
    }
}

// Mengirim data dalam format JSON ke frontend
echo json_encode($merchandise);
?>