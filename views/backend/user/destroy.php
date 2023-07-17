<?php

use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=User&ct=trash');
