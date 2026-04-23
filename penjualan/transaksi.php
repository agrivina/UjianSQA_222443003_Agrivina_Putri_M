<?php
require_once 'api_config.php';
requireLogin();

$transaksis = callAPI('GET', '/transaksi')['response'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Penjualan App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="pelanggan.php">Pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Daftar Transaksi</h2>
        <a href="transaksi_create.php" class="btn btn-primary mb-3">Buat Transaksi Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr><th>ID</th><th>Pelanggan</th><th>Tanggal</th><th>Total</th><th>Metode</th><th>Status</th></tr>
            </thead>
            <tbody>
                <?php foreach ($transaksis as $t): ?>
                <tr>
                    <td><?= $t['id'] ?></td>
                    <td><?= htmlspecialchars($t['pelanggan']['nama'] ?? '-') ?></td>
                    <td><?= $t['tanggal'] ?></td>
                    <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                    <td><?= $t['metode_pembayaran'] ?></td>
                    <td><?= $t['status_pembayaran'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>