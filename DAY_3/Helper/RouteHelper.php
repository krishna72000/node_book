<?php

if (!function_exists("redirect")) {

    function redirect($controller, $data = '') {
        $link = $_SESSION['base_url'] . "?r=" . $controller;
        if ($data !== '') {
            $link .= '&' . $data;
        }
        header('location:' . $link);
    }

}