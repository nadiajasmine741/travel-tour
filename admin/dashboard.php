<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$jml_destinasi = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM destinasi")
);

$jml_booking = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM booking")
);

$jml_pending = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM booking WHERE status='pending'")
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>

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
    background:#0d6efd;
    color:white;
    padding:15px 50px;
}

.logo{
    font-size:24px;
    font-weight:bold;
}

/* Hero */
.hero{
    background:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),
    url('../gambar/destinasi/bali.jpg');
    background-size:cover;
    background-position:center;
    height:250px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;
    text-align:center;
}

.hero h1{
    font-size:40px;
}

/* Layout */
.layout{
    display:flex;
    width:90%;
    margin:30px auto;
    gap:20px;
}

/* Sidebar */
.sidebar{
    width:250px;
    background:white;
    border-radius:15px;
    padding:20px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.sidebar h3{
    margin-bottom:20px;
    color:#0d6efd;
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
    transition:.3s;
}

.sidebar ul li a:hover{
    background:#0d6efd;
    color:white;
}

/* Content */
.content{
    flex:1;
}

.statistik{
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
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h2{
    color:#0d6efd;
    margin-bottom:10px;
}

footer{
    margin-top:50px;
    background:#222;
    color:white;
    text-align:center;
    padding:20px;
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
        <h1>Dashboard Admin</h1>
        <h2><?= $_SESSION['nama']; ?></h2>
    </div>
</div>

<div class="layout">

    <!-- Sidebar -->
    <div class="sidebar">

        <h3>Menu Admin</h3>

        <ul>

            <li>
                <a href="dashboard.php">
                    🏠 Dashboard
                </a>
            </li>

            <li>
                <a href="kelola_destinasi.php">
                    🏝️ Kelola Destinasi
                </a>
            </li>

            <li>
                <a href="kelola_paket.php">
                    🎒 Kelola Paket
                </a>
            </li>

            <li>
                <a href="konfirmasi_booking.php">
                    📋 Konfirmasi Booking
                </a>
            </li>

            <li>
                <a href="laporan.php">
                    📊 Laporan
                </a>
            </li>

            <li>
                <a href="../auth/logout.php">
                    🚪 Logout
                </a>
            </li>

        </ul>

    </div>

    <!-- Content -->
    <div class="content">

        <div class="statistik">

            <div class="card">
                <h2><?= $jml_destinasi ?></h2>
                <p>Total Destinasi</p>
            </div>

            <div class="card">
                <h2><?= $jml_booking ?></h2>
                <p>Total Booking</p>
            </div>

            <div class="card">
                <h2><?= $jml_pending ?></h2>
                <p>Menunggu Konfirmasi</p>
            </div>

        </div>

    </div>

</div>

<footer>
    © 2026 TravelKu - Dashboard Admin
</footer>

</body>
</html>