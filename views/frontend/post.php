<?php

use App\Models\Post;
use App\Libraries\Phantrang;
use App\Libraries\Mystring;

$agrs_post = [

    ['status', '=', 1],

];
$limit = 4;
$page = Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);
$total = Post::where($agrs_post)->count();

$list_post = Post::where($agrs_post)
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
                <h2>Tất cả bài viết</h2>
                <?php foreach ($list_post as $post) : ?>
                    <div class="row border-bottom mb-3">

                        <div class="col-md-4">

                            <a href="index.php?option=post&id=<?= $post->slug; ?>">
                                <img height="300px" width="310px" src="public/images/GioiThieuXe/hinh/<?= $post->image; ?>" alt="<?= $post->image; ?>">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h2>
                                <a class="text-dark" style="text-decoration: none" href="index.php?option=post&id=<?= $post->id; ?>">
                                    <?= $post->title; ?>
                                </a>
                            </h2>
                            <p>
                                <?= Mystring::str_limit($post->detail, 100); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=post'); ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>