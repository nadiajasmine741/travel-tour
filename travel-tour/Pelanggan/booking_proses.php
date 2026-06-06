<?php

session_start();
include '../config/database.php';

$id_user = $_SESSION['id'];

/* Cari data user */
$qUser = mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='$id_user'"
);

$user = mysqli_fetch_assoc($qUser);

/* Cari id_pelanggan berdasarkan email */
$qPelanggan = mysqli_query(
$conn,
"SELECT * FROM pelanggan
WHERE email='".$user['email']."'"
);

$pelanggan = mysqli_fetch_assoc($qPelanggan);

$id_pelanggan = $pelanggan['id_pelanggan'];
$id_destinasi = $_POST['id_destinasi'];
$tanggal_booking = $_POST['tanggal_booking'];
$jumlah_orang = $_POST['jumlah_orang'];

/* Booking melalui paket */
if(isset($_POST['id_paket'])){

    $id_paket = isset($_POST['id_paket'])
            ? $_POST['id_paket']
            : "NULL";

    $get = mysqli_query(
    $conn,
    "SELECT * FROM paket
    WHERE id='$id_paket'"
    );

    $paket = mysqli_fetch_assoc($get);

    $total_harga =
    $paket['harga'] * $jumlah_orang;

}

/* Booking langsung destinasi */
else{

    $get = mysqli_query(
    $conn,
    "SELECT * FROM destinasi
    WHERE id='$id_destinasi'"
    );

    $dest = mysqli_fetch_assoc($get);

    $total_harga =
    $dest['harga'] * $jumlah_orang;
}

mysqli_query(
$conn,
"INSERT INTO booking
(
id_pelanggan,
id_destinasi,
tanggal_booking,
jumlah_orang,
total_harga,
status
)
VALUES
(
'$id_pelanggan',
'$id_destinasi',
'$tanggal_booking',
'$jumlah_orang',
'$total_harga',
'pending'
)"
);

$id_booking = mysqli_insert_id($conn);

echo "
<script>
alert('Booking berhasil');
window.location='pembayaran_form.php?id_booking=$id_booking';
</script>
";

?>