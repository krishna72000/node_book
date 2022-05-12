<?php

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {
        case 'home':
            include 'controller/HomeController.php';
            break;
        default :
            echo "404, Requested page does not exists.";
            break;
    }
    return;
} else {
    include 'controller/HomeController.php';
}
