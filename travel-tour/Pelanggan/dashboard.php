<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$id_pelanggan = $_SESSION['id'];
$jml_booking = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM booking WHERE id_pelanggan='$id_pelanggan'")
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Pelanggan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f5f7fa;
}

/* Navbar */
.navbar{
    background:#0194f3;
    color:white;
    padding:15px 50px;
    display:flex;
    justify-content:space-between;
 
}

.logo{
    font-size:24px;
    font-weight:bold;
}

.menu a{
    color:white;
    text-decoration:none;
    margin-left:20px;
}

/* Hero */
.hero{
    background:linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3)),
    url('../gambar/destinasi/bali.jpg');
    background-size:cover;
    background-position:center;
    height:300px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;
    text-align:center;
}

.hero h1{
    font-size:40px;
}

/* Card Statistik */
.statistik{
    width:100%;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
    text-align:center;
}

.card h2{
    color:#0194f3;
}
.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

footer{
    margin-top:50px;
    background:#222;
    color:white;
    text-align:center;
    padding:20px;
}
.layout{
    display:flex;
    width:90%;
    margin:30px auto;
    gap:20px;
}

.sidebar{
    width:250px;
    background:white;
    border-radius:15px;
    padding:20px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.sidebar h3{
    margin-bottom:20px;
    color:#0194f3;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin-bottom:10px;
}

.sidebar ul li a{
    display:block;
    padding:12px;
    text-decoration:none;
    color:#333;
    border-radius:8px;
    transition:0.3s;
}

.sidebar ul li a:hover{
    background:#0194f3;
    color:white;
}
.sidebar ul li a.active{
    background:#0194f3;
    color:white;
}

.content{
    flex:1;
}
@media(max-width:768px){

    .layout{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
    }

    .statistik{
        grid-template-columns:1fr;
    }

    .navbar{
        flex-direction:column;
        gap:10px;
    }
}

</style>

</head>
<body>

<div class="navbar">

    <div class="logo">
        TravelKu
    </div>

</div>

<div class="hero">
    <div>
        <h1>Selamat Datang</h1>
        <h2><?= $_SESSION['nama']; ?></h2>
    </div>
</div>

<div class="layout">

    <!-- Sidebar -->
    <div class="sidebar">

        <h3>Menu Pelanggan</h3>

        <ul>
            <li>
                <a href="../publik/index.php">
                    🏠 Home
                </a>
            </li>

            <li>
                <a href="booking_saya.php">
                    📋 Riwayat Booking 
                </a>
            </li>

            <li>
                <a href="profile.php">
                    👤 Profil Saya
                </a>
            </li>

            <li>
                <a href="../auth/logout.php">
                    🚪 Logout
                </a>
            </li>
        </ul>

    </div>

    <!-- Konten -->
    <div class="content">

        <div class="statistik">

            <div class="card">
                <h2><?= $jml_booking ?></h2>
                <p>Total Booking</p>
            </div>

            <div class="card">
                <h2>Wisata</h2>
                <p>Destinasi Terbaik</p>
            </div>

            <div class="card">
                <h2>24 Jam</h2>
                <p>Layanan Pelanggan</p>
            </div>

        </div>

    </div>

</div>

<footer>
    © 2026 TravelKu - Sistem Booking Wisata
</footer>

</body>
</html>