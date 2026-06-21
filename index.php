<?php
require_once 'config/config.php';
require_once 'config/database.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'pengenalan';

// Validasi page untuk security
$allowed_pages = ['pengenalan', 'keunggulan', 'fitur', 'cara', 'bahan', 'alat'];
if (!in_array($page, $allowed_pages)) {
    $page = 'pengenalan';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> - Web Interaktif Kuliner</title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1><?php echo APP_NAME; ?></h1>
    <div class="sub"><?php echo APP_DESC; ?></div>

    <!-- Navigasi Tab -->
    <div class="tab-nav">
        <button class="tab-btn <?php echo ($page === 'pengenalan') ? 'active' : ''; ?>" data-tab="pengenalan">Pengenalan</button>
        <button class="tab-btn <?php echo ($page === 'keunggulan') ? 'active' : ''; ?>" data-tab="keunggulan">Keunggulan</button>
        <button class="tab-btn <?php echo ($page === 'fitur') ? 'active' : ''; ?>" data-tab="fitur">Fitur Produk</button>
        <button class="tab-btn <?php echo ($page === 'cara') ? 'active' : ''; ?>" data-tab="cara">Cara Membuat</button>
        <button class="tab-btn <?php echo ($page === 'bahan') ? 'active' : ''; ?>" data-tab="bahan">Bahan-bahan</button>
        <button class="tab-btn <?php echo ($page === 'alat') ? 'active' : ''; ?>" data-tab="alat">Alat-alat</button>
    </div>

    <!-- Konten Dinamis -->
    <div id="pengenalan" class="tab-content active">
        <?php include 'pages/pengenalan.php'; ?>
    </div>
    <div id="keunggulan" class="tab-content">
        <?php include 'pages/keunggulan.php'; ?>
    </div>
    <div id="fitur" class="tab-content">
        <?php include 'pages/fitur.php'; ?>
    </div>
    <div id="cara" class="tab-content">
        <?php include 'pages/cara.php'; ?>
    </div>
    <div id="bahan" class="tab-content">
        <?php include 'pages/bahan.php'; ?>
    </div>
    <div id="alat" class="tab-content">
        <?php include 'pages/alat.php'; ?>
    </div>

    <footer>
        Perancangan Sistem Berbasis Web Resep Kuliner Sate Taican Lilit. © 2026
    </footer>
</div>

<script src="<?php echo APP_URL; ?>/assets/js/script.js"></script>
</body>
</html>
