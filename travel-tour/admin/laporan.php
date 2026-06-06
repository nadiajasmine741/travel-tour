<?php

session_start();

include '../config/database.php';

$data = mysqli_query(
$conn,
"SELECT
b.*,
u.nama AS pelanggan,
d.nama AS destinasi
FROM booking b
JOIN users u
ON b.id_pelanggan = u.id
JOIN destinasi d
ON b.id_destinasi = d.id
ORDER BY b.id_booking DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Booking</title>

    <style>

    body{
        font-family:Arial;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    table,th,td{
        border:1px solid black;
    }

    th,td{
        padding:10px;
    }

    </style>

</head>
<body>

<h2>Laporan Booking Wisata</h2>

<table>

<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Destinasi</th>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Status</th>
</tr>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['pelanggan']; ?></td>

<td><?= $row['destinasi']; ?></td>

<td><?= $row['tanggal_booking']; ?></td>

<td><?= $row['jumlah_orang']; ?></td>

<td>
Rp <?= number_format($row['total_harga']); ?>
</td>

<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<button onclick="window.print()">
Cetak Laporan
</button>

</body>
</html>