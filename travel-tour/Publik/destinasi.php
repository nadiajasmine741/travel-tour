<!-- publik/destinasi.php -->
<?php
include '../config/database.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query dengan pencarian
if ($keyword) {
    $query = "SELECT * FROM destinasi WHERE nama_destinasi LIKE '%$keyword%' OR lokasi LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM destinasi";
}
$destinasi = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Destinasi - Wisataku</title>
</head>
<body>
    <!-- Search Bar -->
    <div class="search-container">
        <form method="GET">
            <input type="text" name="keyword" value="<?= $keyword; ?>" placeholder="Cari destinasi...">
            <button type="submit">Cari</button>
        </form>
        <?php if($keyword): ?>
            <a href="destinasi.php">Clear</a>
        <?php endif; ?>
    </div>

    <!-- List Destinasi -->
    <div class="destinasi-list">
        <?php while($row = mysqli_fetch_assoc($destinasi)): ?>
        <div class="destinasi-item">
            <img src="../gambar/destinasi/<?= $row['gambar']; ?>">
            <h3><?= $row['nama_destinasi']; ?></h3>
            <p><?= $row['lokasi']; ?></p>
            <p><?= format_rupiah($row['harga']); ?></p>
            <a href="detail_destinasi.php?id=<?= $row['id']; ?>">Lihat Detail</a>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>