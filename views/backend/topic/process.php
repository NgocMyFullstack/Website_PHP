<?php
use App\Models\Topic;
use App\Libraries\Mystring;
if (isset($_POST['THEM'])){
    $row =new Topic;
    $row ->name = $_POST['name'];
    $row ->metadesc = $_POST['metadesc'];
    $row ->metakey = $_POST['metakey'];
    $row ->parent_id = $_POST['parent_id'];
    $row ->slug = $_POST['slug'];
    $row ->status = $_POST['status'];
    $row ->slug = Mystring::str_slug($_POST['name']);
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
 header('location:index.php?option=Topic');
}


if (isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $row = Topic::find($id);
    $row ->name = $_POST['name'];
    $row ->metadesc = $_POST['metadesc'];
    $row ->metakey = $_POST['metakey'];
    $row ->parent_id = $_POST['parent_id'];
    $row ->slug = $_POST['slug'];
    $row ->status = $_POST['status'];
    $row ->slug = Mystring::str_slug($_POST['name']);
    $row ->created_at = date('Y-m-d H:i:s');
    $row ->created_by = 1;
    $row-> save();
 header('location:index.php?option=Topic');
}