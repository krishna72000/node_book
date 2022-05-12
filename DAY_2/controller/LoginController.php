<?php

include 'model/DbModel.php';

if (empty($_POST)) {
    include 'view/login.php';
    return;
}

echo "check login";
