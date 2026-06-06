<?php
session_start();

// Cek login
function cek_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../auth/login.php");
        exit;
    }
}

// Cek role admin
function cek_admin() {
    cek_login();
    if ($_SESSION['role'] != 'admin') {
        header("Location: ../pelanggan/dashboard.php");
        exit;
    }
}

// Format Rupiah
function format_rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Redirect dengan pesan
function redirect($url, $pesan = '') {
    if ($pesan) {
        $_SESSION['pesan'] = $pesan;
    }
    header("Location: $url");
    exit;
}
?>