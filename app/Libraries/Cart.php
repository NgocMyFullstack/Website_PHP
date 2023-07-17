<?php

namespace App\Libraries;

class Cart
{
    public static function cart_exists($carts, $id)
    {
        foreach ($carts as $cart) {
            if ($cart['id'] == $id)
                return true;
        }
        return false;
    }
    public static function cart_update($carts, $id, $number, $type = "add")
    {
        foreach ($carts as $key => $cart) {
            if ($cart['id'] == $id) {
                if ($type == $id) {
                    $carts[$key]['qty'] = $carts[$key]['qty'] + $number;
                } else {
                    $carts[$key]['qty'] = $number;
                }
                $carts[$key]['amount'] = $carts[$key]['qty'] * $carts[$key]['price'];
                break;
            }
        }
        return $carts;
    }
    public static function cart_delete($carts, $id)
    {
        if (is_numeric($id)) {
            foreach ($carts as $key => $cart) {
                if ($cart['id'] == $id) {
                    unset($carts[$key]);
                    break;
                }
            }
            return $carts;
        }
        return null;
    }
}
