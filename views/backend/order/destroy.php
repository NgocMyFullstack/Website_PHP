<?php

use App\Models\Order;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Order::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=order&ct=trash');
