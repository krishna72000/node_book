<?php

if (!isset($_SESSION['login'])) {
    $_SESSION['back_url'] = $_SERVER['HTTP_REFERER'];
    header("$base_url/index.php?r=login");
    return;
}