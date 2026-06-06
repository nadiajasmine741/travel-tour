<?php

session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM destinasi
     WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];

    $foto_lama = $_POST['foto_lama'];

    if($_FILES['foto']['name'] != ''){

        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        move_uploaded_file(
            $tmp,
            "../gambar/destinasi/".$foto
        );

    }else{

        $foto = $foto_lama;

    }

    mysqli_query(
        $conn,
        "UPDATE destinasi SET
        nama='$nama',
        harga='$harga',
        foto='$foto'
        WHERE id='$id'"
    );

    echo "
    <script>
        alert('Data berhasil diperbarui');
        window.location='kelola_destinasi.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Destinasi</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    padding:30px;
}

.container{
    width:600px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    margin-bottom:20px;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
}

img{
    border-radius:10px;
    margin-bottom:15px;
}

.btn{
    background:#0d6efd;
    color:white;
    border:none;
    padding:10px 20px;
    cursor:pointer;
    border-radius:5px;
}

.back{
    background:gray;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:5px;
}

</style>

</head>
<body>

<div class="container">

<h2>Edit Destinasi</h2>

<form method="POST" enctype="multipart/form-data">

    <input
    type="hidden"
    name="foto_lama"
    value="<?= $data['foto']; ?>">

    <label>Nama Destinasi</label>

    <input
    type="text"
    name="nama"
    value="<?= $data['nama']; ?>"
    required>

    <label>Harga</label>

    <input
    type="number"
    name="harga"
    value="<?= $data['harga']; ?>"
    required>

    <label>Foto Saat Ini</label>

    <br><br>

    <img
    src="../gambar/destinasi/<?= $data['foto']; ?>"
    width="250">

    <br><br>

    <label>Upload Foto Baru</label>

    <input
    type="file"
    name="foto">

    <br>

    <button
    type="submit"
    name="update"
    class="btn">
    Update
    </button>

    <a
    href="kelola_destinasi.php"
    class="back">
    Kembali
    </a>

</form>

</div>

</body>
</html>