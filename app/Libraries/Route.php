<?php

namespace App\Libraries;

class Route
{
    public static function route_site()
    {
        $pathView = 'views/frontend/';
        if (isset($_REQUEST['option'])) {
            $pathView .= $_REQUEST['option'];
            if (isset($_REQUEST['id'])) {
                $pathView .= '-detail.php';
            } else {
                if (isset($_REQUEST['cat'])) {
                    $pathView .= '-category.php';
                } else {
                    $pathView .= '.php';
                }
            }
        } else {
            $pathView .= 'home.php';
        }
        //goi o day
        require_once($pathView);
    }
    //Tuy bien url trang quan ly
    public static function route_admin()
    {
        $pathView = '../views/backend/';
        if (isset($_REQUEST['option'])) {
            $pathView .= $_REQUEST['option'] . '/';
            if (isset($_REQUEST['cat'])) {
                $pathView .= $_REQUEST['cat'] . ".php";
            } else {
                $pathView .= "index.php";
            }
        } else {
            $pathView .= "dashboard/index.php";
        }
        require_once($pathView);
    }
}
