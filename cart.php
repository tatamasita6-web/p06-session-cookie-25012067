<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data/products.php';

$pageTitle = 'Keranjang Belanja';

$cartItems = [];
$total = 0;

foreach ($_SESSION['cart'] as $productId => $quantity) {
    $product = get_product_by_id($products, $productId);

    if ($product === null) {
        continue;
    }

    $subtotal = $product['price'] * $quantity;
    $total += $subtotal;

    $cartItems[] = [
        'product' => $product,
        'quantity' => $quantity,
        'subtotal' => $subtotal
    ];
}

require_once __DIR__ . '/components/header.php';
?>

<h1>Keranjang Belanja</h1>

<?php if (empty($cartItems)): ?>

    <div class="card">
        <p>Keranjang belanja kamu masih kosong.</p>
        <a href="index.php" style="color: #16a085;">Kembali ke katalog</a>
    </div>

<?php else: ?>

    <div class="card">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 1px solid #ccc;">
                    <th style="padding: 12px;">Produk</th>
                    <th style="padding: 12px;">Harga</th>
                    <th style="padding: 12px;">Jumlah</th>
                    <th style="padding: 12px;">Subtotal</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">
                            <?= e($item['product']['name']); ?>
                        </td>

                        <td style="padding: 12px;">
                            <?= format_rupiah($item['product']['price']); ?>
                        </td>

                        <td style="padding: 12px;">
                            <?= e($item['quantity']); ?>
                        </td>

                        <td style="padding: 12px;">
                            <?= format_rupiah($item['subtotal']); ?>
                        </td>

                        <td style="padding: 12px;">
                            <form action="actions.php" method="POST"
                                  onsubmit="return confirm('Hapus produk ini dari keranjang?');">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="product_id"
                                       value="<?= e($item['product']['id']); ?>">

                                <button type="submit"
                                        style="background-color: #dc3545; color: white;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 style="text-align: right; margin-top: 20px;">
            Total: <?= format_rupiah($total); ?>
        </h2>

        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
            <a href="index.php" style="color: #16a085;">Tambah produk</a>

            <form action="actions.php" method="POST"
                  onsubmit="return confirm('Kosongkan seluruh keranjang?');">
                <input type="hidden" name="action" value="clear">

                <button type="submit"
                        style="background-color: #dc3545; color: white;">
                    Kosongkan Keranjang
                </button>
            </form>
        </div>
    </div>

<?php endif; ?>

<?php
require_once __DIR__ . '/components/footer.php';
?>