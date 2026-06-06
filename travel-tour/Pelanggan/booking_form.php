<?php
session_start();

include '../config/database.php';

/* CEK LOGIN */
if(!isset($_SESSION['id'])){

    $_SESSION['redirect_after_login'] =
    $_SERVER['REQUEST_URI'];

    header("Location: ../auth/login.php");
    exit;
}

/* ==========================
   BOOKING MELALUI PAKET
========================== */

if(isset($_GET['id_destinasi']) && isset($_GET['id_paket'])){

    $mode = "paket";

    $id_destinasi = $_GET['id_destinasi'];
    $id_paket = $_GET['id_paket'];

    $qDest = mysqli_query(
    $conn,
    "SELECT * FROM destinasi
    WHERE id='$id_destinasi'"
    );

    $destinasi = mysqli_fetch_assoc($qDest);

    $qPaket = mysqli_query(
    $conn,
    "SELECT * FROM paket
    WHERE id='$id_paket'"
    );

    $paket = mysqli_fetch_assoc($qPaket);

}

/* ==========================
   BOOKING DESTINASI LANGSUNG
========================== */

elseif(isset($_GET['id'])){

    $mode = "destinasi";

    $id_destinasi = $_GET['id'];

    $qDest = mysqli_query(
    $conn,
    "SELECT * FROM destinasi
    WHERE id='$id_destinasi'"
    );

    $destinasi = mysqli_fetch_assoc($qDest);

}

/* ==========================
   DATA TIDAK DITEMUKAN
========================== */

else{

    echo "Data tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Paket Wisata</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    padding:30px;
}

.card{
    max-width:700px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    color:#0194f3;
}

button{
    background:#0194f3;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:5px;
    cursor:pointer;
}

input{
    width:100%;
    padding:10px;
}

</style>

</head>
<body>

<div class="card">

<h2>Form Booking Paket Wisata</h2>

<form action="booking_proses.php" method="POST">

    <input type="hidden"
           name="id_destinasi"
           value="<?= $destinasi['id']; ?>">

    <?php if($mode == 'paket'){ ?>

        <input type="hidden"
               name="id_paket"
               value="<?= $paket['id']; ?>">

    <?php } ?>

    <p>
        <b>Destinasi :</b>
        <?= $destinasi['nama']; ?>
    </p>

    <?php if($mode == 'paket'){ ?>

        <p>
            <b>Paket :</b>
            <?= $paket['nama_paket']; ?>
        </p>

        <p>
            <b>Durasi :</b>
            <?= $paket['lama_hari']; ?> Hari
        </p>

        <p>
            <b>Harga Paket :</b>
            Rp <?= number_format($paket['harga']); ?>
        </p>

    <?php } else { ?>

        <p>
            <b>Harga Destinasi :</b>
            Rp <?= number_format($destinasi['harga']); ?>
        </p>

    <?php } ?>

    <label>Tanggal Keberangkatan</label>
    <br><br>

    <input type="date"
           name="tanggal_booking"
           required>

    <br><br>

    <label>Jumlah Orang</label>
    <br><br>

    <input type="number"
           name="jumlah_orang"
           min="1"
           required>

    <br><br>

    <button type="submit">
        Simpan Booking
    </button>

</form>
</div>

</body>
</html>