<?php

session_start();
include '../config/database.php';

if(!isset($_GET['id_booking'])){
    die("ID Booking tidak ditemukan");
}

$id_booking = $_GET['id_booking'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM booking
     WHERE id_booking='$id_booking'"
);

$booking = mysqli_fetch_assoc($query);

if(!$booking){
    die("Data booking tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Pembayaran</title>
</head>
<body>

<h2>Upload Bukti Pembayaran</h2>

<p>
Total Bayar :
<b>
Rp <?= number_format($booking['total_harga']); ?>
</b>
</p>

<form
action="pembayaran_proses.php"
method="POST"
enctype="multipart/form-data">

<input type="hidden"
name="id_booking"
value="<?= $booking['id_booking']; ?>">

<input type="file"
name="bukti"
required>

<br><br>

<button type="submit">
Upload
</button>

</form>

</body>
</html>