<?php

session_start();
$base_url = 'http://notebook.com/DAY_5/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = 'home';
include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';
include 'Helper/RouteHelper.php';

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {
        case 'home':
            $_SESSION['active_url'] = 'home';
            include 'controller/HomeController.php';
            break;
        case 'login':
            $_SESSION['active_url'] = 'login';
            include 'controller/LoginController.php';
            break;
        case 'signup':
            $_SESSION['active_url'] = 'signup';
            include 'controller/SignupController.php';
            break;
        case 'logout':
            include 'controller/LogoutController.php';
            break;
        case 'contact-list':
            $_SESSION['active_url'] = 'contact-list';
            include 'controller/ContactListController.php';
            break;
        case 'new-contact':
            $_SESSION['active_url'] = 'new-contact';
            include 'controller/NewContactController.php';
            break;
        case 'view-contact':
            $_SESSION['active_url'] = 'view-contact';
            include 'controller/ViewContactController.php';
            break;
        case 'update-contact':
            $_SESSION['active_url'] = 'update-contact';
            include 'controller/UpdateContactController.php';
            break;
        case 'delete-contact':
            $_SESSION['active_url'] = 'delete-contact';
            include 'controller/DeleteContactController.php';
            break;
        default :
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/HomeController.php';
}
