<?php
session_start();
include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query(
$conn,
"SELECT * FROM paket
WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Paket</title>
</head>
<body>

<h2>Edit Paket Wisata</h2>

<form action="kelola_paket_update.php" method="POST">

<input type="hidden"
       name="id"
       value="<?= $data['id']; ?>">

<label>Nama Paket</label>
<br>
<input type="text"
       name="nama_paket"
       value="<?= $data['nama_paket']; ?>"
       required>

<br><br>

<label>Deskripsi</label>
<br>
<textarea name="deskripsi"
          rows="5"
          cols="50"><?= $data['deskripsi']; ?></textarea>

<br><br>

<label>Harga</label>
<br>
<input type="number"
       name="harga"
       value="<?= $data['harga']; ?>"
       required>

<br><br>

<label>Lama Hari</label>
<br>
<input type="number"
       name="lama_hari"
       value="<?= $data['lama_hari']; ?>"
       required>

<br><br>

<button type="submit">
Simpan Perubahan
</button>

</form>

</body>
</html>