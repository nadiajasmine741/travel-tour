<?php

session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

/* SIMPAN DATA */

if(isset($_POST['simpan'])){

    $id_destinasi = $_POST['id_destinasi'];
    $nama_paket   = $_POST['nama_paket'];
    $deskripsi    = $_POST['deskripsi'];
    $harga        = $_POST['harga'];
    $lama_hari    = $_POST['lama_hari'];

    mysqli_query(
        $conn,
        "INSERT INTO paket
        (
            id_destinasi,
            nama_paket,
            deskripsi,
            harga,
            lama_hari
        )
        VALUES
        (
            '$id_destinasi',
            '$nama_paket',
            '$deskripsi',
            '$harga',
            '$lama_hari'
        )"
    );

    header("Location: kelola_paket.php");
}

/* HAPUS */

if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query(
        $conn,
        "DELETE FROM paket_wisata
         WHERE id_paket='$id'"
    );

    header("Location: kelola_paket.php");
}

$query = mysqli_query(
$conn,
"SELECT p.*, d.nama
FROM paket p
JOIN destinasi d
ON p.id_destinasi = d.id
ORDER BY p.id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Paket Wisata</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    padding:30px;
}

.container{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

input, textarea{
    width:100%;
    padding:10px;
    margin-bottom:10px;
}

button{
    background:#0d6efd;
    color:white;
    border:none;
    padding:10px 20px;
    cursor:pointer;
    border-radius:5px;
}

.back{
    text-decoration:none;
    background:gray;
    color:white;
    padding:10px 20px;
    border-radius:5px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th{
    background:#0d6efd;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

.btn-edit{
    background:orange;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

.btn-hapus{
    background:red;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

</style>

</head>
<body>

<div class="container">

<h2>Kelola Paket Wisata</h2>

<a href="dashboard.php" class="back">
← Dashboard
</a>

<hr><br>

<h3>Tambah Paket Wisata</h3>

<form method="POST">

    <label>Destinasi</label>

    <select name="id_destinasi" required>

        <option value="">-- Pilih Destinasi --</option>

        <?php
        $dest = mysqli_query($conn,"SELECT * FROM destinasi");

        while($d=mysqli_fetch_assoc($dest)){
        ?>

        <option value="<?= $d['id'] ?>">
            <?= $d['nama'] ?>
        </option>

        <?php } ?>

    </select>

    <br><br>

    <input
    type="text"
    name="nama_paket"
    placeholder="Nama Paket"
    required>

    <br><br>

    <textarea
    name="deskripsi"
    placeholder="Deskripsi Paket"
    required></textarea>

    <br><br>

    <input
    type="number"
    name="harga"
    placeholder="Harga Paket"
    required>

    <br><br>

    <input
    type="number"
    name="lama_hari"
    placeholder="Lama Hari"
    required>

    <br><br>

    <button
    type="submit"
    name="simpan">
    Simpan
    </button>

</form>

<br>

<h3>Data Paket Wisata</h3>

<table>

<tr>
    <th>No</th>
    <th>Destinasi</th>
    <th>Nama Paket</th>
    <th>Harga</th>
    <th>Lama Hari</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;

while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nama'] ?></td>

<td><?= $row['nama_paket'] ?></td>

<td>
Rp <?= number_format($row['harga']) ?>
</td>

<td>
<?= $row['lama_hari'] ?> Hari
</td>

<td>

<a href="kelola_paket_edit.php?id=<?= $row['id'] ?>">
Edit
</a>

|

<a
href="kelola_paket_delete.php?id=<?= $row['id'] ?>"
onclick="return confirm('Yakin?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>
</div>

</body>
</html>