<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$id_user = $_SESSION['id'];

$query = mysqli_query(
$conn,
"SELECT b.*, d.nama
FROM booking b
JOIN destinasi d ON b.id_destinasi=d.id
WHERE b.id_pelanggan='$id_user'
ORDER BY b.id_booking DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Saya</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    padding:30px;
}

h2{
    color:#333;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th{
    background:#00a8ff;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

.btn{
    padding:8px 15px;
    background:#28a745;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.pending{
    color:orange;
    font-weight:bold;
}

.dibayar{
    color:blue;
    font-weight:bold;
}

.selesai{
    color:green;
    font-weight:bold;
}

.dibatalkan{
    color:red;
    font-weight:bold;
}

.btn-dashboard{
    display:inline-block;
    padding:10px 20px;
    background:#007bff;
    color:white;
    text-decoration:none;
    border-radius:5px;
    margin-bottom:15px;
}

.btn-dashboard:hover{
    background:#0056b3;
}

</style>

</head>
<body>

<h2>Riwayat Booking Saya</h2>

<a href="dashboard.php" class="btn-dashboard">
    ← Kembali ke Dashboard
</a>

<br><br>

<table>

<tr>
    <th>No</th>
    <th>Destinasi</th>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>


<?php
$no=1;

while($data=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $data['nama'] ?></td>

<td><?= $data['tanggal_booking'] ?></td>

<td><?= $data['jumlah_orang'] ?></td>

<td>
Rp <?= number_format($data['total_harga']) ?>
</td>

<td class="<?= $data['status'] ?>">
<?= ucfirst($data['status']) ?>
</td>

<td>

<?php if($data['status']=='pending'){ ?>

<a href="pembayaran_form.php?id_booking=<?= $data['id_booking'] ?>"
class="btn">
Upload Pembayaran
</a>

<?php }elseif($data['status']=='dibayar'){ ?>

Menunggu Verifikasi

<?php }elseif($data['status']=='selesai'){ ?>

Selesai

<?php }else{ ?>

Dibatalkan

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>