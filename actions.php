<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data/products.php';

// Semua aksi harus menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {

    // Menambahkan produk ke keranjang
    case 'add':
        $productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

        if (!$productId || $productId < 1) {
            set_flash('ID produk tidak valid.', 'error');
            header('Location: index.php');
            exit;
        }

        $product = get_product_by_id($products, $productId);

        if ($product === null) {
            set_flash('Produk tidak ditemukan.', 'error');
            header('Location: index.php');
            exit;
        }

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 0;
        }

        $_SESSION['cart'][$productId]++;

        set_flash($product['name'] . ' berhasil ditambahkan ke keranjang.');
        header('Location: cart.php');
        exit;

    // Menghapus satu produk dari keranjang
    case 'remove':
        $productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

        if (!$productId || !isset($_SESSION['cart'][$productId])) {
            set_flash('Produk tidak ditemukan di keranjang.', 'error');
            header('Location: cart.php');
            exit;
        }

        unset($_SESSION['cart'][$productId]);

        set_flash('Produk berhasil dihapus dari keranjang.');
        header('Location: cart.php');
        exit;

    // Mengosongkan seluruh keranjang
    case 'clear':
        $_SESSION['cart'] = [];

        set_flash('Keranjang berhasil dikosongkan.');
        header('Location: cart.php');
        exit;

    // Mengubah tema menggunakan cookie
    case 'theme':
        $theme = $_POST['theme'] ?? '';

        if (!in_array($theme, ['light', 'dark'], true)) {
            set_flash('Pilihan tema tidak valid.', 'error');
            header('Location: index.php');
            exit;
        }

        setcookie('theme', $theme, [
            'expires' => time() + (30 * 24 * 60 * 60),
            'path' => '/',
            'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
        exit;

    default:
        set_flash('Aksi tidak dikenal.', 'error');
        header('Location: index.php');
        exit;
}