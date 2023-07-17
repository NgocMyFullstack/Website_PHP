<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Post::find($id);
$row->status = 0;
$row->updated_at = date('y-m-d H:i:s');
$row->updated_by = 1;
$row->save();
MessageArt::set_flash('message', ['type'=>'success','msg'=>'Xóa vào thùng rác thành công']);
header('location: index.php?option=post');
