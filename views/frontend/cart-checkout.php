<?php

use App\Models\Product;

$tong = 0;
if (!isset($_SESSION['logincustomer'])) {
    header('location:index.php?option=customer&f=login');
}
$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}

?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&checkoutCart=true" method="post">
    <section class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="text-center">Đơn hàng của bạn</h1>
                    <?php if ($content_cart != null) : ?>
                        <table class="table table-bordered border-primary">
                            <tr>
                                <th>ID</th>
                                <th>Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>

                            <?php $total_mony = 0; ?>
                            <?php foreach ($content_cart as $cart) : ?>
                                <?php
                                $product = Product::find($cart['id']);
                                ?>
                                <tr>
                                    <th><?= $cart['id']; ?></th>
                                    <th>
                                        <img height="200px" width="70px" src="public/images/GioiThieuXe/hinh/<?= $product->image; ?>" class="card-img-top" alt="<?= $product->image; ?>">
                                    </th>
                                    <th><?= $product->name; ?></th>
                                    <th><?= number_format($cart['price']); ?></th>
                                    <th>
                                        <?= $cart['qty']; ?>
                                    </th>
                                    <th><?= number_format($cart['amount']); ?></th>
                                </tr>
                                <?php $total_mony += $cart['amount']; ?>
                            <?php endforeach; ?>

                        </table>
                        <th class="text-end">
                            <strong>Tổng tiền: <?= number_format($total_mony) . " vnđ"; ?></strong>
                        </th>

                    <?php else : ?>
                        <h2>chưa có sản phẩm trong giỏ hàng</h2>
                    <?php endif; ?>
                </div>

                <div class="col-md-3">
                    <h3>Biker việt nam</h3>
                    <input type="hidden" name="sum" value="<?= $total_mony; ?>">
                    <button type="submit">Thanh toán</button>
                    <div class="mb-3 py-3">
                        <input name="dellveryname" type="text" class="form-control" placeholder="Họ tên người nhận">
                    </div>
                    <div class="mb-3">
                        <input name="dellveryphone" type="text" class="form-control" placeholder="Số điện thoại liên hệ">
                    </div>
                    <div class="mb-3">
                        <input name="dellveryemail" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input name="dellveryaddress" type="text" class="form-control" placeholder="Địa chỉ người nhận">
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>