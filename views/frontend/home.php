<?php

use App\Models\Category;
use App\Models\Product;


$list_category = Category::where([['status', '=', 1], ['parent_id', '=', 0]])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<!--Nội Dung -->
<div class="container">

    <!-- <div class="banner">
        <?php require_once('views/frontend/mod_slider.php'); ?>
        <h1 class="tieude"> Đam Mê Dẫn Lối </h1>
        <p class="tieude"><i>Tuổi trẻ ta hết mình với thứ gọi là đam mê vậy đã bao giờ bạn đã trò chuyện với đam mê của minh chưa ? </i></p>
    </div> -->


    <div class="section-product-category">
        <?php foreach ($list_category as $row_cat) : ?>
            <?php
            $list_category_id = array();
            array_push($list_category_id, $row_cat->id);
            $list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
                ->get();
            if (count($list_category1) > 0) {
                foreach ($list_category1 as $row_cat1) {
                    array_push($list_category_id, $row_cat1->id);
                    $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])
                        ->get();
                    if (count($list_category2) > 0) {
                        foreach ($list_category2 as $row_cat2) {
                            array_push($list_category_id, $row_cat2->id);
                            $list_category3 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])
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
            $product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
                ->orderBy('created_at', 'DESC')
                ->take(10)
                ->get();
            ?>
            <h2 class="text-center my-5 category-title">
                <a href="index.php?option=product&cat=<?= $row_cat->slug; ?>">
                    <?= $row_cat->name; ?>
                </a>
            </h2>
            <div class="row">
                <?php foreach ($product_list as $product) : ?>
                    <div class="col-md-3">
                        <div class="product-item border">
                            <div class="product-image">
                                <a class="text-dark" style="text-decoration: none" href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <img height="200px" width="310px" src="public/images/GioiThieuXe/hinh/<?= $product->image; ?>" alt="<?= $product->image; ?>">
                                </a>
                            </div>
                            <h3 class="product-name">
                                <a class="text-dark" style="text-decoration: none" href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <?= $product->name; ?>
                                </a>
                            </h3>
                            <div class="product-price">
                                <div class="row">
                                    <div class="col-6">
                                        Giá Bán: <?= number_format($product->price); ?>đ
                                    </div>
                                    <div class="col-6">
                                        <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success">Thêm vào giỏ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>
    </div>

    <!-- <div class="body-content">
        <div class="body-content-item">
            <a href="public/images/GioiThieuXe/MT15.html"><img src="public/images/182664179_2984277685139297_1057049115840335558_n.jpg" width="300px" height="300px" /></a>
            <h2>Yamaha MT15</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/Yamaha%20R7.html"><img src="public/images/2022-Yamaha-R7-chayxe-vn-12.jpg" width="300px" height="300px" /></a>
            <h2>Yamaha R7</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/Yamaha%20R1M%202020.html"><img src="public/images/2020-Yamaha-YZF-R1M-First-Look-sport-motorcycle-3.jpg" width="300px" height="300px" /></a>
            <h2>Yamaha R1M 2020</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/Honda%20CB155R.html"><img src="public/images/1582462825-423-diem-danh-top-6-moto-phan-khoi-300cc-tot-nhat-hien-nay-moto2-1582382929-width660height405.jpg" width="300px" height="300px" /></a>
            <h2>Honda CB155R</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/HONDA%20650R%202022.html"><img src="public/images/honda650.jpg" width="300px" height="300px" /></a>
            <h2>HONDA 650R 2022</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/HONDA1000RRR.html"><img src="public/images/honda1000rrr.png" width="300px" height="300px" /></a>
            <h2>HONDA1000RRR</h2>
        </div>
        <div class="body-content-item">
            <a href="http://127.0.0.1:5500/GioiThieuXe/KAWASAKI%20Z1000.html"><img src="public/images/kawasaki-z1000-thuong-motor-1.jpg" width="300px" height="300px" /></a>
            <h2>KAWASAKI Z1000</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/KAWASAKI%20ZX10R.html"><img src="public/images/zx10r.JPG" width="300px" height="300px" /></a>
            <h2>KAWASAKI ZX10R</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/KAWASAKI%20NINJA%20H2R.html "><img src="public/images/Kawasaki-Ninja-H2R-than-gio.jpg" width="300px" height="300px" /></a>
            <h2>KAWASAKI NINJA H2R</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/BMW%20R1250GS.html "><img src="public/images/can-canh-bmw-r-1250-gs-phien-ban-dac-biet-tai-viet-nam-9a3-6211152.jpg" width="300px" height="300px" /></a>
            <h2> BMW R1250GS</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/BMW%20S1000RR%202018.html"><img src="public/images/camap.PNG" width="300px" height="300px" /></a>
            <h2>BMW S1000RR 2018</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/BMW%20S1000RR.html"><img src="public/images/IMG-3632-1644915862.jpg" width="300px" height="300px" /></a>
            <h2>BMW S1000RR</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/DUCATI%20150CC.html"><img src="public/images/ducati-v4-150-01-1024x683.jpg" width="300px" height="300px" /></a>
            <h2>DUCATI 150CC</h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/Ducati%20streetfighter%20v4.html"><img src="public/images/Ducaaaa.jpg" width="300px" height="300px" /></a>
            <h2>ducati streetfighter v4 </h2>
        </div>
        <div class="body-content-item">
            <a href=" http://127.0.0.1:5500/GioiThieuXe/ducati%20v4s%202021.html"><img src="public/images/img-bgt-2021-img-bgt-2021-panigale-v4-2021-1-1623278431-width1200height630-1623278435-width1200height630.jpg" width="300px" height="300px" /></a>
            <h2>ducati v4s 2021</h2>
        </div>

    </div>

</div> -->



    <!--Go top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script class="gotop">
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    </body>

    </html>
    <?php require_once('views/frontend/footer.php'); ?>