<?php
include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM destinasi WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

if(!$data){
    die("Destinasi tidak ditemukan");
}
$paket = mysqli_query(
$conn,
"SELECT * FROM paket
WHERE id_destinasi='$id'"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $data['nama']; ?></title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
    .paket-container{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
        gap:20px;
        margin-top:20px;
    }

    .paket-card{
        background:#fff;
        padding:20px;
        border-radius:10px;
        box-shadow:0 3px 10px rgba(0,0,0,.1);
    }

    .paket-card h3{
        color:#0194f3;
    }

    .paket-card a{
        display:inline-block;
        margin-top:10px;
        padding:10px 15px;
        background:#0194f3;
        color:white;
        text-decoration:none;
        border-radius:5px;
    }

    .paket-card a:hover{
        background:#0077cc;
    }
    </style>

</head>
<body>

<div class="navbar">
    <h2>TravelKu</h2>

    <div>
        <a href="index.php">Home</a>
        <a href="../auth/login.php">Login</a>
    </div>
</div>

<div style="padding-top:100px; width:80%; margin:auto;">

    <img
    src="../gambar/destinasi/<?= $data['foto']; ?>"
    width="100%">

    <h1><?= $data['nama']; ?></h1>

    <h3>
        Rp <?= number_format($data['harga']); ?>
    </h3>

    <p>
        <?= $data['lokasi']; ?>
    </p>

    <p>
        <?= $data['deskripsi']; ?>
    </p>
    
<h2>Paket Wisata Tersedia</h2>

<?php if(mysqli_num_rows($paket) > 0){ ?>

<div class="paket-container">

    <?php while($p=mysqli_fetch_assoc($paket)){ ?>

    <div class="paket-card">

        <h3><?= $p['nama_paket']; ?></h3>

        <p><?= $p['deskripsi']; ?></p>

        <p>
            Lama Perjalanan :
            <?= $p['lama_hari']; ?> Hari
        </p>

        <h4>
            Rp <?= number_format($p['harga']); ?>
        </h4>

        <a href="../pelanggan/booking_form.php?id_destinasi=<?= $data['id']; ?>&id_paket=<?= $p['id']; ?>">
            Pilih Paket
        </a>

    </div>

    <?php } ?>

</div>

<?php } else { ?>

<div class="paket-card">

    <h3>Paket Belum Tersedia</h3>

    <p>
        Saat ini belum ada paket wisata untuk destinasi ini.
    </p>

    <a href="../pelanggan/booking_form.php?id=<?= $data['id']; ?>">
        Booking Destinasi
    </a>

</div>

<?php } ?>

</div>

</body>
</html>

