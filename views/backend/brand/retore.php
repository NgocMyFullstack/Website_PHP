<?php

use App\Models\Brand;
use App\Libraries\MessageArt;
$id = $_REQUEST['id'];
$row = Brand::find($id);
$row->status = 2;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1; //ID của người đăng nhập
$row->save(); //lưu
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công thành công']);
header('location: index.php?option=brand&cat=trash');
