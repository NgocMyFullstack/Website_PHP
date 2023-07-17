<?php

use App\Models\Contact;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Contact::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=contact&ct=trash');
