<?php

session_start();
include '../config/database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE email='$email'
     AND password='$password'"
);

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    // ADMIN
    if($data['role'] == 'admin'){
        header("Location: ../admin/dashboard.php");
        exit;
    }

    // PELANGGAN
    if(isset($_SESSION['redirect_after_login'])){

        $redirect =
        $_SESSION['redirect_after_login'];

        unset($_SESSION['redirect_after_login']);

        header("Location: ../pelanggan/".$redirect);
        exit;
    }

    header("Location: ../pelanggan/dashboard.php");
    exit;
}

{

    echo "
    <script>
        alert('Email atau password salah');
        window.location='login.php';
    </script>
    ";
}