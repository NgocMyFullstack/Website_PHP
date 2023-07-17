<?php

use App\Models\Product;
use App\Models\Category;

$slug = $_REQUEST['id'];
$row_product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();

$list_category_id = array();
array_push($list_category_id, $row_product->category_id);
$list_category1 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_product->category_id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_cat1->id]])
            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2); {
                array_push($list_category_id, $row_cat2->id);
                $list_category3 = Category::where([['status', '=', '1'], ['parent_id', '=', $row_cat2->id]])
                    ->get();
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat3) {
                        array_push($list_category_id, $row_cat3->id);
                    }
                }
            }
        }
    }
}
$product_list = Product::where([['status', '=', 1], ['id', '!=', $row_product->id]])
    ->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'DESC')
    ->take(8)
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&addcart=<?= $row_product->id; ?>" method="post">

    <section class="maincontent my-3">
        <div class="container">
            <div class="row product-header">
                <div class="col-md-6">
                    <img class="img-fluid" src="public/images/GioiThieuXe/hinh/<?= $row_product->image; ?>" alt="<?= $row_product->name; ?>">
                </div>
                <div class="col-md-6">
                    <h1 class="product-name text-center"><?= $row_product->name; ?></h1>
                    <h2 class="product-price">Giá: <?= number_format($row_product->price); ?> VNĐ</h2>
                    <div class="bg-light float-left" style="width: 120px;">
                        4.8<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                    </div>
                    <div class="bg-light float-left" style="width: 150px;">
                        8.642.000 Đánh giá
                    </div>
                    <div>
                        <h5>2k3 Đã bán <i class="far fa-question-circle"></i></h5>
                    </div>
                    <div>
                        <h5>Vận chuyển: </h5><i class="fas fa-shipping-fast"></i> vận chuyển nhanh
                    </div>
                    <div>
                        <p>
                        <h5>Các đơn vị vận chuyển:</h5> Chuyển phát nhanh,EWP,ship code</p>
                    </div>
                    <div>
                        <p>
                        <h5>Số lượng: <?= $row_product->qty; ?></h5>
                        </p>
                    </div>
                    <div class="input-group mb-3">
                        <input name="qty" type="number" value="1" class="form-control" aria-describedby="basic-addon2">
                        <button type="ADDCART" class="input-group-text" id="basic-addon2">Đặt mua</button>
                    </div>


                </div>
            </div>
            <div class="row product-detail">
                <div class="col-md-12">
                    <h3>CHI TIẾT SẢN PHẨM</h3>
                    <p>
                        <?= $row_product->detail; ?>
                    </p>
                </div>
            </div>
            <h3 class="text-center"> SẢN PHẨM CÙNG LOẠI</h3>
            <div class="row product-other">
                <?php foreach ($product_list as $product) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="product-item border border-3">
                            <div class="position-relative">
                                <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <img width="410px" height="300px" src="public/images/GioiThieuXe/hinh/<?= $product->image; ?>" class="rounded mx-auto d-block" width="450" height="300px alt=" <?= $product->name; ?>">
                                    <div class="position-absolute top-0 start-0">
                                        <p class="sale-off btn btn-danger">-16%</p>
                                    </div>
                                </a>
                            </div>
                            <h3 class="product-name text-center">
                                <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <?= $product->name; ?>
                                </a>
                            </h3>
                            <div class="product-price">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-center">Gía bán:<?= number_format($product->price); ?>VNĐ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="index.php?option=cart&addcart=<?= $product->id; ?>">
                                            <div class="mua anh1">
                                                <button type="button" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>