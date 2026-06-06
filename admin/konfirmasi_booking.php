<?php

session_start();

include '../config/database.php';

$data = mysqli_query(
$conn,
"SELECT
b.*,
u.nama,
d.nama AS destinasi
FROM booking b
JOIN users u
ON b.id_pelanggan = u.id
JOIN destinasi d
ON b.id_destinasi = d.id
WHERE b.status='dibayar'"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Verifikasi Pembayaran</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f5f7fa;
}

.header{
    background:#0d6efd;
    color:white;
    padding:20px 40px;
}

.container{
    width:95%;
    margin:30px auto;
}

.card{
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    margin-bottom:20px;
    color:#333;
}

.btn-dashboard{
    background:#6c757d;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:8px;
    margin-bottom:20px;
    display:inline-block;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
}

th{
    background:#0d6efd;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

tr:hover{
    background:#f8f9fa;
}

.btn-bukti{
    background:#17a2b8;
    color:white;
    text-decoration:none;
    padding:8px 12px;
    border-radius:5px;
}

.btn-konfirmasi{
    background:#28a745;
    color:white;
    text-decoration:none;
    padding:8px 12px;
    border-radius:5px;
}

.kosong{
    text-align:center;
    padding:30px;
    color:#777;
}

</style>

</head>
<body>

<div class="header">
    <h1>Verifikasi Pembayaran</h1>
</div>

<div class="container">

    <a href="dashboard.php" class="btn-dashboard">
        ← Kembali ke Dashboard
    </a>

    <div class="card">

        <h2>Daftar Booking Dibayar</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Destinasi</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            if(mysqli_num_rows($data) > 0){

                while($row=mysqli_fetch_assoc($data)){
            ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $row['nama']; ?></td>

                <td><?= $row['destinasi']; ?></td>

                <td>

                    <a
                    href="../gambar/pembayaran/<?= $row['bukti_pembayaran']; ?>"
                    target="_blank"
                    class="btn-bukti">
                    Lihat Bukti
                    </a>

                </td>

                <td>

                    <a
                    href="verifikasi.php?id=<?= $row['id_booking']; ?>"
                    class="btn-konfirmasi"
                    onclick="return confirm('Konfirmasi pembayaran ini?')">
                    Konfirmasi
                    </a>

                </td>

            </tr>

            <?php
                }
            }else{
            ?>

            <tr>
                <td colspan="5" class="kosong">
                    Belum ada pembayaran yang menunggu verifikasi
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>