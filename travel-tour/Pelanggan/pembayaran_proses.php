-<?php

include '../config/database.php';

$id_booking = $_POST['id_booking'];

$nama_file =
time() . "_" .
$_FILES['bukti']['name'];

$tmp =
$_FILES['bukti']['tmp_name'];

move_uploaded_file(
$tmp,
"../gambar/pembayaran/" .
$nama_file
);

mysqli_query(
$conn,
"UPDATE booking
SET
bukti_pembayaran='$nama_file',
status='Dibayar'
WHERE id_booking='$id_booking'"
);

echo "
<script>
alert('Bukti pembayaran berhasil diupload');
window.location='booking_saya.php';
</script>
";