<?php
require_once('../vendor/autoload.php');
require_once('../config/database.php');
session_start();
if (!isset($_SESSION['loginadmin'])) {
    header("location:login.php");
}

use App\Libraries\Route;

Route::route_admin();
