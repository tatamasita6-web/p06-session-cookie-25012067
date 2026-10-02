<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data/products.php';

$pageTitle = 'Katalog Produk';

require_once __DIR__ . '/components/header.php';
?>

<h1>Katalog Produk</h1>
<p>Selamat datang! Silakan pilih produk yang ingin kamu beli.</p>

<div style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 25px;
">
    <?php foreach ($products as $product): ?>
        <div class="card">
            <h3><?= e($product['name']); ?></h3>

            <p><?= e($product['description']); ?></p>

            <h3 style="color: #16a085;">
                <?= format_rupiah($product['price']); ?>
            </h3>

            <form action="actions.php" method="POST">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id" value="<?= e($product['id']); ?>">

                <button
                    type="submit"
                    style="background-color: #16a085; color: white; width: 100%;"
                >
                    Tambah ke Keranjang
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php
require_once __DIR__ . '/components/footer.php';
?>