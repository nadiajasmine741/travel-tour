<?php

session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$query = mysqli_query(
    $conn,
    "SELECT * FROM destinasi ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Destinasi</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    padding:30px;
}

h2{
    margin-bottom:20px;
}

.btn{
    background:#0d6efd;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:10px;
    display:inline-block;
    margin:5px;
}

.btn-edit{
    background:orange;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:5px;
    display:inline-block;
    margin-right:8px;
}

.btn-hapus{
    background:red;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:5px;
    display:inline-block;
    margin-right:8px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    margin-top:20px;
}

th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

img{
    border-radius:8px;
}

</style>

</head>
<body>

<h2>Kelola Destinasi Wisata</h2>

<a href="dashboard.php" class="btn">
    ← Dashboard
</a>

<a href="kelola_destinasi_add.php" class="btn">
    + Tambah Destinasi
</a>

<table>

<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama Destinasi</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>

<?php

$no = 1;

while($data = mysqli_fetch_assoc($query)){

?>

<tr>

    <td><?= $no++ ?></td>

    <td>
        <img
        src="../gambar/destinasi/<?= $data['foto']; ?>"
        width="120">
    </td>

    <td>
        <?= $data['nama']; ?>
    </td>

    <td>
        Rp <?= number_format($data['harga']); ?>
    </td>

    <td>

        <a
        href="kelola_destinasi_edit.php?id=<?= $data['id']; ?>"
        class="btn-edit">
        Edit
        </a>

        <a
        href="kelola_destinasi_delete.php?id=<?= $data['id']; ?>"
        class="btn-hapus"
        onclick="return confirm('Yakin ingin menghapus?')">
        Hapus
        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>