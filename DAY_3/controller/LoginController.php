<?php

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/login.php';
    return;
}

try {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error['body'] = 'Email and password are required.';
        $error['title'] = 'Danger!!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/login.php';
        return;
    }
    $email = filterText($_POST['email']);
    $password = filterText($_POST['password']);

    $user = db_login($email, $password);
    if ($user) {
        $_SESSION['login'] = TRUE;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        redirect('home');
    } else {
        $error['body'] = 'No user found with given email and password.';
        $error['title'] = 'Info!!!';
        $error['type'] = 'info';
        setFlash('message', $error);
        include 'view/login.php';
        return;
    }
} catch (Exception $ex) {
    include 'controller/ErrorController.php';
}



