<?php

use App\Models\Post;

$slug = $_REQUEST['cat'];
$args_page = [
    ['status', '=', 1],
    ['slug', '=', $slug]

];

$row_post = Post::where($args_page)->first();
?>

<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <img src="public/img/post/<?= $row_post->images; ?>" alt="">
        <h1><?= $row_post->title; ?></h1>
        <p><?= $row_post->detail; ?></p>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>