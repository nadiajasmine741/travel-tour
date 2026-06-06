<?php

include '../config/database.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE booking
SET status='selesai'
WHERE id_booking='$id'"
);

header("Location: konfirmasi_booking.php");
exit;
?>