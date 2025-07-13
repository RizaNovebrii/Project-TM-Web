<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: register.php");
    exit;
}

include 'koneksi.php';
?>

$produk_id = $_POST['produk_id'];
$username = $_POST['username'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$query = "INSERT INTO reviews (produk_id, username, rating, comment) VALUES ('$produk_id', '$username', '$rating', '$comment')";
mysqli_query($koneksi, $query);

header("Location: detail.php?id=$produk_id");
exit();
?>
