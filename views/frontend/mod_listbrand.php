<?php
 use App\Models\Brand;
 
 $mod_list_brand=Brand::where('status','=',1)->orderBy('sort_order')->get();
 ?>
<div class="mod_listcategory mb-3">
    <ul class="list-group">
        <li class="list-group-item bg-mainmenu" aria-current="true">Thương Hiệu</li>
        <?php foreach($mod_list_brand as $mod_row_listbrand):?>
        <li class="list-group-item">
            <a href="index.php?option=brand&cat=<?=$mod_row_listbrand->slug;?>"> <?=$mod_row_listbrand->name;?>
            </a>
        </li>       
        <?php endforeach;?>
    </ul>
</div> 
