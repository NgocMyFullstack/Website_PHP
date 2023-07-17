<?php

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Libraries\Cart;

if (isset($_REQUEST['addcart'])) {
    $id = $_REQUEST['addcart'];
    $product = Product::find($id);
    $cart_item = array(
        'id' => $product->id,
        'price' => $product->price,
        'qty' => 1,
        'amount' => $product->price
    );

    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        if ((Cart::cart_exists($carts, $id) == true)) {
            $carts = Cart::cart_update($carts, $id, 1);
        } else {
            //ch
            $carts[] = $cart_item;
        }
        $_SESSION['contentcart'] = $carts;
    } else {
        $carts[] = $cart_item;
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['delcart'])) {
    $id = $_REQUEST['delcart'];
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_delete($carts, $id);
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}
if (isset($_POST['updateCart'])) {
    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $number) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_update($carts, $id, $number, "update");
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['checkoutCart'])) {
    $user = User::find($_SESSION['user_id']);
    $date = getdate();
    $order = new Order();
    $order->code = $date[0];
    $order->user_id = $_SESSION['user_id'];
    
    if ($_POST['dellveryaddress'] != null) {
        $order->dellveryaddress = $_POST['dellveryaddress'];
    } else {
        $order->dellveryaddress = $user['address'];
    }
    if ($_POST['dellveryname'] != null) {
        $order->dellveryname = $_POST['dellveryname'];
    } else {
        $order->dellveryname = $user['name'];
    }
    if ($_POST['dellveryphone'] != null) {
        $order->dellveryphone = $_POST['dellveryphone'];
    } else {
        $order->dellveryphone = $user['phone'];
    }
    if ($_POST['dellveryemail'] != null) {
        $order->dellveryemail = $_POST['dellveryemail'];
    } else {
        $order->dellveryemail = $user['email'];
    }


    $order->dellveryaddress = (isset($_POST['dellveryaddress']) ? $_POST['dellveryaddress'] : $user['address']);
    $order->dellveryname = (isset($_POST['dellveryname']) ? $_POST['dellveryname'] : $user['name']);
    $order->dellveryphone = (isset($_POST['dellveryphone']) ? $_POST['dellveryphone'] : $user['phone']);
    $order->dellveryemail = (isset($_POST['dellveryemail']) ? $_POST['dellveryemail'] : $user['email']);
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    if ($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
           
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
        }
    }
    unset($_SESSION['contentcart']);
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['checkout'])) {
    require_once('views/frontend/cart-checkout.php');
} else {
    require_once('views/frontend/cart-content.php');
}
