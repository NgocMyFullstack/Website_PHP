<?php

use App\Models\Category;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\Topic;
use App\Models\Post;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;


if (isset($_POST['THEMCATEGORY'])) {
    if (isset($_POST['categoryId'])) {
        $listid = $_POST['categoryId'];
        foreach ($listid as $id) {
            $category = Category::find($id);
            $menu = new Menu;
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->sort_order = 1;
            $menu->parent_id = 0;
            $menu->position = $_POST['position'];
            $menu->table_id = $category->id;
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=menu');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn danh mục']);
        header('location:index.php?option=menu');
    }
}


if (isset($_POST['THEMBRAND'])) {
    if (isset($_POST['brandId'])) {
        $listid = $_POST['brandId'];
        foreach ($listid as $id) {
            $brand = Brand::find($id);
            $menu = new Menu;
            $menu->name =  $brand->name;
            $menu->link = 'index.php?option=brand&cat=' .  $brand->slug;
            $menu->type = 'brand';
            $menu->sort_order = 1;
            $menu->parent_id = 0;
            $menu->position = $_POST['position'];
            $menu->table_id = $brand->id;
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=menu');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn thương hiệu']);
        header('location:index.php?option=menu');
    }
}

if (isset($_POST['THEMTOPIC'])) {
    if (isset($_POST['topicId'])) {
        $listid = $_POST['topicId'];
        foreach ($listid as $id) {
            $topic = Topic::find($id);
            $menu = new Menu;
            $menu->name =  $topic->name;
            $menu->link = 'index.php?option=post&cat=' .  $topic->slug;
            $menu->type = 'topic';
            $menu->sort_order = 1;
            $menu->parent_id = 0;
            $menu->position = $_POST['position'];
            $menu->table_id = $topic->id;
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
            $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=menu');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn chủ đề']);
        header('location:index.php?option=menu');
    }
}


if (isset($_POST['THEMPAGE'])) {
    if (isset($_POST['pageId'])) {
        $listid = $_POST['pageId'];
        foreach ($listid as $id) {
            $page = Post::find($id);
            $menu = new Menu;
            $menu->name =  $page->title;
            $menu->link = 'index.php?option=page&cat=' .  $page->slug;
            $menu->type = 'page';
            $menu->sort_order = 1;
            $menu->parent_id = 0;
            $menu->position = $_POST['position'];
            $menu->table_id = $page->id;
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
            $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=menu');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn trang đơn']);
        header('location:index.php?option=menu');
    }
}


if (isset($_POST['THEMCUSTOM'])) {
    if (strlen($_POST['name']) > 0 && strlen($_POST['link']) > 0) {
        $menu = new Menu;
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order = 1;
        $menu->parent_id = 0;
        $menu->position = $_POST['position'];
        $menu->status = 2;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=menu');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa đủ thông tin']);
        header('location:index.php?option=menu');
    }
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = Menu::find($id);
    $row->name = $_POST['name'];
    $row->link = $_POST['link'];
    $row->position = $_POST['position'];
    $row->parent_id = $_POST['parent_id'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location: index.php?option=menu');
}
if (isset($_POST['CAPNHATTT'])) {
    $arr_listid = $_POST['sort_order'];
    foreach ($arr_listid as $id => $order) {
        $row = Menu::find($id);
        $row->sort_order = $order;
        $row->save();
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
        header('location: index.php?option=menu');
    }
}
