<?php

use App\Models\Category;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Category::find($id);
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id']; //ID của người đăng nhập
$row->save(); //lưu
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xoa vào thùng rác thành công']);
header('location: index.php?option=category');
