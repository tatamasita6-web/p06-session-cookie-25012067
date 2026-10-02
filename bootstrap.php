<?php
// Memulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menyiapkan keranjang belanja
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Menyiapkan flash message
if (!isset($_SESSION['flash']) || !is_array($_SESSION['flash'])) {
    $_SESSION['flash'] = [];
}