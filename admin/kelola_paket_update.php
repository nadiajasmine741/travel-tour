<?php

session_start();
include '../config/database.php';

$id = $_POST['id'];
$nama_paket = $_POST['nama_paket'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$lama_hari = $_POST['lama_hari'];

mysqli_query(
$conn,
"UPDATE paket SET
nama_paket='$nama_paket',
deskripsi='$deskripsi',
harga='$harga',
lama_hari='$lama_hari'
WHERE id='$id'"
);

echo "
<script>
alert('Data paket berhasil diupdate');
window.location='kelola_paket.php';
</script>
";
?>