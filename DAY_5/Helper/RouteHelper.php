<?php

if (!function_exists("redirect")) {

    function redirect($controller, $data = []) {
        $link = $_SESSION['base_url'] . "?r=" . $controller;
        if (!empty($data)) {
            $link .= '&' . http_build_query($data);
        }
        header('location:' . $link);
    }

}