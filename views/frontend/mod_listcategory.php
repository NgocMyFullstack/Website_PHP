<?php

use App\models\Category;

$args_mod_listcat = [
    ['status', '=', 1],
    ['parent_id', '=', 0],

];
$mod_list_category = Category::where($args_mod_listcat)->orderby('sort_order')->get();
?>
<div class="mod_listcategory mb-3">
    <ul class="list-group">
        <li class="list-group-item bg-mainmenu" aria-current="true">Danh Mục Sản Phẩm</li>
        <?php foreach ($mod_list_category as $mod_row_listcat) : ?>
            <li class="list-group-item">
                <a href="index.php?option=product&cat=<?= $mod_row_listcat->slug; ?>"><?= $mod_row_listcat->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>