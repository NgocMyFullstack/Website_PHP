<?php

use App\Models\Product;
use App\Libraries\Phantrang;

$page = Phantrang::pageCurrent();
$limit = 1;
$offset = Phantrang::pageOffset($page, $limit);
$total = Product::where([['status', '=', 1]])->count();
//end
$product_list = Product::where('status', '=', 1)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();
?>

<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                require_once('views/frontend/mod_listcategory.php');
                require_once('views/frontend/mod_listbrand.php');
                ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">TẤT CẢ THƯƠNG HIỆU</h2>
                <div class="row">
                    <?php foreach ($product_list as $product) : ?>
                        <div class="col-sm-3 col-xs-12 padding-none col-fix20 text-center linhkien">
                            <div class="item">
                                <div class="product-item border">
                                    <div class="product-image">
                                        <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                            <img width="240px" height="200px" src="public/images/GoiThieuXe/hinh/<?= $product->image; ?>" alt="<?= $product->image; ?>">
                                        </a>
                                    </div>

                                </div>
                                <h3 class="product-name"><?= $product->name; ?></h3>

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
                    <?php endforeach; ?>
                </div>
                <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=brand'); ?></div>
            </div>

        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>