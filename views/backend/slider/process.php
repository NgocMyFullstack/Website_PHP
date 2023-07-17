<?php

use App\Models\Slider;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['THEM'])) {
    $row = new Slider;
    $row->name = $_POST['name'];
    $row->position = 'slidershow';
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    //upload file
    $path_dir = "../public/img/slider/";
    $file = $_FILES["image"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extention = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
    if (in_array($file_extention, ['png', 'jpg', 'gif'])) {
        $path_file = $path_dir . $row->name . "." . $file_extention;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->name . "." . $file_extention;
        $row->save();
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=slider');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu hình ảnh không hợp lệ']);
        header('location:index.php?option=slider&cat=create');
    }
}

if (isset($_POST['CAPNHAT'])) {

    $id = $_POST['id'];
    $row = Slider::find($id);
    $row->name = $_POST['name'];
    $row->position = 'slidershow';
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    //upload file
    if (strlen($_FILES["image"]["name"]) != 0) {
        $path_dir = "../public/images/slider/";
        $file = $_FILES["image"];
        $path_file = $path_dir . basename($file["name"]);
        $file_extention = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
        if (!in_array($file_extention, ['png', 'jpg', 'gif'])) {
            MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu hình ảnh không hợp lệ']);
            header('location:index.php?option=slider&cat=edit');
        }
        $path_file = $path_dir . $row->name . "." . $file_extention;
        $path_delete = $path_dir . $row->image;
        if (file_exists($path_delete)) {
            unlink($path_delete);
        }
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->name . "." . $file_extention;
    }
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location:index.php?option=slider');
}
