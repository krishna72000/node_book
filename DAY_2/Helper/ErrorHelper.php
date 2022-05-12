<?php

if (!function_exists("throwError")) {

    function throwError($title = '???', $description = 'Unknown error occoured') {
        $error['title'] = $title;
        $error['description'] = $description;
        include 'view/error.php';
        die;
    }

}