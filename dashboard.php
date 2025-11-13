<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$kode_barang = ["001", "002", "003", "004", "005"];
$nama_barang = ["Bakso urat", "Mie sop", "Bakso Dengan Mie ayam komplit", "es sirup", "Jus buah"];
$harga_barang = [15000, 12000, 20000, 5000, 8000];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
</head>
<body>
    <h1>--POLGAN MART--</h1>
    <h2>Welcome <?= $_SESSION['username'];?></h2>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>