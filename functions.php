<?php

// Mengamankan teks agar tidak menjalankan kode HTML
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Mengubah angka menjadi format Rupiah
function format_rupiah($angka)
{
    return 'Rp ' . number_format((float) $angka, 0, ',', '.');
}

// Menyimpan pesan sementara (flash message)
function set_flash($message, $type = 'success')
{
    $_SESSION['flash'] = [
        'message' => $message,
        'type' => $type
    ];
}

// Mengambil pesan sementara dan menghapusnya setelah dibaca
function get_flash()
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
}

// Mencari produk berdasarkan ID
function get_product_by_id($products, $id)
{
    foreach ($products as $product) {
        if ((string) $product['id'] === (string) $id) {
            return $product;
        }
    }

    return null;
}