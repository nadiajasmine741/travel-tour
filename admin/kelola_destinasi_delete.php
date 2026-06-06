<?php

include '../config/database.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM destinasi
    WHERE id='$id'"
);

header("Location: kelola_destinasi.php");