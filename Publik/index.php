<?php
include '../config/database.php';
$data = mysqli_query($conn, "SELECT * FROM destinasi");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Tour</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="navbar">
    <h2>TravelKu</h2>
    <div>
        <a href="../auth/login.php">Login</a>
        <a href="../auth/register.php">Register</a>
    </div>
</div>

<!-- HERO SECTION -->
<div class="hero">
    <div class="overlay">
        <h1>Experience the Wonder</h1>
        <p>Jelajahi destinasi terbaik dengan harga terbaik</p>
        <a href="#destinasi" class="btn">Mulai Sekarang</a>
    </div>
</div>

<!-- DESTINASI -->
<section id="destinasi">
    <h2>MOST POPULAR TOURS</h2>

    <div class="card-container">
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <a href="detail_destinasi.php?id=<?= $row['id'] ?>" class="card">

                <img src="../gambar/destinasi/<?= $row['foto']; ?>">

                <div class="card-body">
                    <h3><?= $row['nama'] ?></h3>
                    <p>Rp <?= number_format($row['harga']) ?></p>
                    <button>Booking Now</button>
                </div>

            </a>
        <?php } ?>
    </div>
</section>

<!-- ABOUT -->
<section class="about">
    <div class="about-content">
        <h2>ABOUT US</h2>
        <p>Kami menyediakan layanan travel terbaik dengan pengalaman tak terlupakan.</p>
        <button>Learn More</button>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>© 2025 Travel Tour | All Rights Reserved</p>
</footer>

</body>
</html>