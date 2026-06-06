<?php
session_start();
include '../config/database.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../gambar/destinasi/".$foto
    );

    mysqli_query(
        $conn,
        "INSERT INTO destinasi
        (nama,harga,foto)
        VALUES
        ('$nama','$harga','$foto')"
    );

    header("Location: kelola_destinasi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Destinasi</title>
</head>
<body>

<h2>Tambah Destinasi</h2>

<form method="POST" enctype="multipart/form-data">

    Nama Destinasi
    <br>
    <input type="text" name="nama" required>

    <br><br>

    Harga
    <br>
    <input type="number" name="harga" required>

    <br><br>

    Foto
    <br>
    <input type="file" name="foto" required>

    <br><br>

    <button name="simpan">
        Simpan
    </button>

</form>

</body>
</html>