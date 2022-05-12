<?php

include 'Helper/SessionHelper.php';

unset($_SESSION['login']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);

redirect('login');
