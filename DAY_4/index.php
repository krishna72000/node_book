<?php

session_start();
$base_url = 'http://notebook.com/DAY_4/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = '';
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
        case 'note-list':
            $_SESSION['active_url'] = 'note-list';
            include 'controller/NoteListController.php';
            break;
        case 'new-note':
            $_SESSION['active_url'] = 'new-note';
            include 'controller/NewNoteController.php';
            break;
        case 'view-note':
            $_SESSION['active_url'] = 'view-note';
            include 'controller/ViewNoteController.php';
            break;
        case 'update-note':
            $_SESSION['active_url'] = 'update-note';
            include 'controller/UpdateNoteController.php';
            break;
        case 'delete-note':
            $_SESSION['active_url'] = 'delete-note';
            include 'controller/DeleteNoteController.php';
            break;
        default :
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/HomeController.php';
}
