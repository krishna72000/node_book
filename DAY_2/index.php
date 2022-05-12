<?php

session_start();

include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';

$base_url = 'http://notebook.com/DAY_2/';

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {
        case 'home':
            include 'controller/HomeController.php';
            break;
        case 'login':
            include 'controller/LoginController.php';
            break;
        case 'signup':
            include 'controller/SignupController.php';
            break;
        default :
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/HomeController.php';
}
