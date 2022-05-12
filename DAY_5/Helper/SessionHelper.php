<?php

//include 'Helper/RouteHelper.php';


if (!isset($_SESSION['login'])) {
    redirect('login');
    return;
}