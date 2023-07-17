<?php

use App\Models\Slider;

use App\Libraries\MessageArt;
$id=$_REQUEST['id'];
$row=Slider::find($id);
if($row==null)
{ 
    MessageArt::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại']);
    header('location: index.php?option=slider');
}
$row -> delete();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xóa vĩnh viễn thành công']);
header('location:index.php?option=slider&cat=trash');