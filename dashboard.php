<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$kode_barang = ["001", "002", "003", "004", "005"];
$nama_barang = ["Ayam penyet", "Mie Ayam", "Mie bagladesh", "jus", "es teh"];
$harga_barang = [15000, 12000, 20000, 5000, 8000];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;


$jumlah_item = rand(1, 5);
for ($i = 0; $i < $jumlah_item; $i++) {
    $index = rand(0, 5); 
    $beli[] = $nama_barang[$index];
    $jumlah[] = rand(1, 5); 
    $total[] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}

$diskon = 0;
if ($grandtotal < 50000) {
    $diskon = 0.05 * $grandtotal;
} elseif ($grandtotal <= 100000) {
    $diskon = 0.10 * $grandtotal;
} else {
    $diskon = 0.15 * $grandtotal;
}
$total_akhir = $grandtotal - $diskon;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f0f8ff, #e6e6fa);
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .logout-btn {
            display: block;
            margin: 0 auto 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
        .shopping-list {
            margin: 20px 0;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
        .item:last-child {
            border-bottom: none;
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background: #e8f5e8;
            border-radius: 5px;
            text-align: center;
        }
        .summary p {
            margin: 5px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>--POLGAN MART--</h1>
        <p>SELAMAT DATANG <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>

        <div class="shopping-list">
            <h3>Daftar Belanja:</h3>
            <?php foreach ($beli as $key => $barang): ?>
                <div class="item">
                    <span><?php echo htmlspecialchars($barang); ?> x <?php echo $jumlah[$key]; ?></span>
                    <span>Rp <?php echo number_format($total[$key], 0, ',', '.'); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

    <h1>--POLGAN MART--</h1>
    <p>weslcome <?php echo $_SESSION['username']; ?>!</p>
        <div class="summary">
            <p>Total Belanja: Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></p>
            <p>Diskon: Rp <?php echo number_format($diskon, 0, ',', '.'); ?></p>
            <p>Total Akhir: Rp <?php echo number_format($total_akhir, 0, ',', '.'); ?></p>
        </div>
    </div>
</body>
</html>

<?php
echo "<pre>";  
foreach ($beli as $key => $barang) {
    echo $barang . " x " . $jumlah[$key] . " = Rp " . number_format($total[$key], 0, ',', '.') . "\n";
    
}
echo "-----------------------\n";
echo "Total Belanja : Rp " . number_format($grandtotal, 0, ',', '.') . "\n";
echo "-----------------------\n";
echo "</pre>"; 
?>