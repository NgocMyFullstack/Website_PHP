<?php

use App\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}

?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart" method="post">
    <section class="maincontent">
        <div class="container">
            <h1 class="text-center">giỏ hàng của bạn</h1>
            <?php if ($content_cart != null) : ?>
                <table class="table table-bordered border-primary">
                    <tr>
                        <th>ID</th>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php $total_mony = 0; ?>
                    <?php foreach ($content_cart as $cart) : ?>
                        <?php
                        $product = Product::find($cart['id']);
                        ?>
                        <tr>
                            <th><?= $cart['id']; ?></th>
                            <th>
                                <img height="200px" width="200px" src="public/images/GioiThieuXe/hinh/<?= $product->image; ?>" class="card-img-top" alt="<?= $product->image; ?>">
                            </th>
                            <th><?= $product->name; ?></th>
                            <th><?= number_format($cart['price']); ?></th>
                            <th>
                                <input style="width:50px" min="1" type="number" name="qty[<?= $cart['id']; ?>]" value="<?= $cart['qty']; ?>">
                            </th>
                            <th><?= number_format($cart['amount']); ?></th>
                            <th class="text-center">
                                <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>">
                                    <i class="fas fa-trash" aria-hidden="true"></i></a>
                            </th>
                        </tr>
                        <?php $total_mony += $cart['amount']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="4">
                            <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">
                                Xóa tất cả
                            </a>
                            <input type="submit" name="updateCart" class="btn btn-sm btn-info" value="Cập nhật">
                            <a class="btn btn-sm btn-success" href="index.php?option=cart&checkout=true">Thanh toán</a>
                        </th>

                        <th class="text-end" colspan="3">
                            <strong>Tổng tiền: <?= number_format($total_mony) . "Vnđ"; ?></strong>
                        </th>
                    </tr>
                </table>
            <?php else : ?>
                <h2>chưa có sản phẩm trong giỏ hàng</h2>
            <?php endif; ?>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>