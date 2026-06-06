<?php
session_start();
include '../config/database.php';

// CEK LOGIN
if(!isset($_SESSION['id'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = $_SESSION['id'];

// AMBIL DATA DARI TABEL PELANGGAN
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
            margin:0;
        }

        .container{
            width:450px;
            margin:60px auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
            text-align:center;
        }

        .avatar{
            width:100px;
            height:100px;
            border-radius:50%;
            background:#0194f3;
            color:white;
            font-size:40px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 15px;
            overflow:hidden;
        }

        .avatar img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        h2{
            margin-bottom:5px;
        }

        p{
            color:#666;
            margin:5px 0;
        }

        .info{
            text-align:left;
            margin-top:20px;
        }

        .info p{
            padding:6px 0;
            border-bottom:1px solid #eee;
        }

        .label{
            font-weight:bold;
            color:#333;
        }

        .btn{
            margin-top:20px;
            display:inline-block;
            padding:10px 20px;
            background:#0194f3;
            color:white;
            text-decoration:none;
            border-radius:8px;
        }

        .btn:hover{
            background:#007bd1;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- AVATAR -->
    <div class="avatar">
        <?php if(!empty($data['foto'])): ?>
            <img src="../uploads/<?= $data['foto']; ?>">
        <?php else: ?>
            <?= strtoupper(substr($data['nama'],0,1)); ?>
        <?php endif; ?>
    </div>

    <h2><?= $data['nama']; ?></h2>
    <p><?= $data['email']; ?></p>

    <div class="info">

        <p><span class="label">No HP:</span> <?= $data['no_hp']; ?></p>

        <p><span class="label">Alamat:</span> 
            <?= $data['alamat'] ? $data['alamat'] : '-' ?>
        </p>

        <p><span class="label">Jenis Kelamin:</span> 
            <?= $data['jenis_kelamin'] ? $data['jenis_kelamin'] : '-' ?>
        </p>

        <p><span class="label">Tanggal Lahir:</span> 
            <?= $data['tanggal_lahir'] ? $data['tanggal_lahir'] : '-' ?>
        </p>

        <p><span class="label">Bergabung:</span> <?= $data['created_at']; ?></p>

    </div>

    <a href="dashboard.php" class="btn">Kembali ke Dashboard</a>

</div>

</body>
</html>