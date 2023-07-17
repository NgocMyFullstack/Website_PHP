<?php

use App\Models\Menu;

$args_footer = [
    ['status', '=', 1],
    ['position', '=', 'footermenu']
];
$list_menu_footer = Menu::where($args_footer)->get();
?>
<h3 class="fs-5">Chăm Sóc Khách Hàng</h3>
<ul>
    <?php foreach ($list_menu_footer as $menu_footer) : ?>
        <li><a class="text-dark" style="text-decoration: none" href="<?= $menu_footer->link; ?>"> <?= $menu_footer->name; ?> </a></li>
    <?php endforeach; ?>

</ul>