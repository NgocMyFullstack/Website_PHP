<?php

use App\Models\Menu;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Menu::find($id);
// cach 2 $row1= menu::where('id','=',$id)->first();    
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id']; //id của người đăng nhập
$row->save(); //lưu
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công']);

header('location: index.php?option=menu');//chuyển hướng trang
//UPDATE ntbn_menu SET
//SELECT * FROM ntbn_menu WHERE id='2'