<?php

namespace App\Libraries;

class MessageArt
{
    //Hàm gán giá trị
    public static function set_flash($name, $msg)
    {
        $_SESSION[$name] = $msg;
    }
    //Hàm lấy giá trị
    public static function get_flash($name)
    {
        $message = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $message;
    }
    //Hàm kiểm tra tồn tại
    public static function has_flash($name)
    {
        return isset($_SESSION[$name]);
    }
}
