<?php

use App\Models\Menu;

$args1 = [
    ['status', '=', 1],
    ['parent_id', '=', 0],
    ['position', '=', 'mainmenu']
];
$list_menu1 = Menu::where($args1)->get();
?>
<nav class="navbar navbar-expand-lg my">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-suitcase"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach ($list_menu1 as $menu1) : ?>
                    <?php
                    $args2 = [
                        ['status', '=', 1],
                        ['parent_id', '=',  $menu1->id],
                        ['position', '=', 'mainmenu']
                    ];
                    $list_menu2 = Menu::where($args2)->get();
                    ?>
                    <?php if (count($list_menu2) != 0) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $menu1->name; ?>
                            </a>
                            <ul class="dropdown-menu bg-mainmenu">
                                <?php foreach ($list_menu2 as $menu2) : ?>
                                    <li><a class="dropdown-item border-bottom" href="<?= $menu2->link; ?>"><?= $menu2->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>

                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $menu1->link; ?>">
                                <?= $menu1->name; ?>
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endforeach; ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>