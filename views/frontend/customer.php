<?php
$f = $_REQUEST['f'];
switch ($f) {
    case 'login': {
            require_once("views/frontend/customer-login.php");
            break;
        }
    case 'logout': {
            unset($_SESSION['logincustomer']);
            header(('location:index.php?option=customer&f=login'));
            break;
        }
    case 'register': {
            require_once("views/frontend/customer-register.php");
            break;
        }
    case 'profile': {
            require_once("views/frontend/customer-profile.php");
            break;
        }
    default: {
            require_once("views/frontend/error-404.php");
            break;
        }
}
