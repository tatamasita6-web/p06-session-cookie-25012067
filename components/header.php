<?php
// Mengambil tema dari cookie
$theme = $_COOKIE['theme'] ?? 'light';

// Memastikan tema hanya light atau dark
if (!in_array($theme, ['light', 'dark'], true)) {
    $theme = 'light';
}

// Mengambil judul halaman
$pageTitle = $pageTitle ?? 'Toko Sederhana';

// Mengambil flash message
$flash = get_flash();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle); ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: <?= $theme === 'dark' ? '#1e1e1e' : '#f5f5f5'; ?>;
            color: <?= $theme === 'dark' ? '#f5f5f5' : '#333333'; ?>;
        }

        .navbar {
            background-color: <?= $theme === 'dark' ? '#292929' : '#ffffff'; ?>;
            padding: 16px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .navbar h2 {
            margin: 0;
            color: #16a085;
        }

        .navbar a {
            color: inherit;
            text-decoration: none;
            margin-left: 18px;
        }

        .container {
            width: 84%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .card {
            background-color: <?= $theme === 'dark' ? '#292929' : '#ffffff'; ?>;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        button {
            padding: 9px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .theme-button {
            background-color: #16a085;
            color: white;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #842029;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <h2>Toko Sederhana</h2>

        <div>
            <a href="index.php">Beranda</a>
            <a href="cart.php">Keranjang</a>

            <form action="actions.php" method="POST" style="display: inline;">
                <input type="hidden" name="action" value="theme">
                <input type="hidden" name="theme" value="<?= $theme === 'light' ? 'dark' : 'light'; ?>">

                <button type="submit" class="theme-button">
                    <?= $theme === 'light' ? 'Mode Gelap' : 'Mode Terang'; ?>
                </button>
            </form>
        </div>
    </nav>

    <main class="container">
        <?php if ($flash): ?>
            <div class="alert alert-<?= e($flash['type']); ?>">
                <?= e($flash['message']); ?>
            </div>
        <?php endif; ?>