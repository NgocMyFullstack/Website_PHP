<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Post::find($id);
$row->status = ($row['status'] == 1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 2;
$row->save();
MessageArt::set_flash('message', ['type'=>'success','msg'=>'Khôi phục thành công']);
header('location: index.php?option=post&cat=trash');
