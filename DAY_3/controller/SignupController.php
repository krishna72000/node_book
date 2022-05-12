<?php

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/signup.php';
    return;
}

try {
    $flag = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['phone']);

    //validate user inputdata
    if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }
    //checking minimum length of password.
    $password = filterText($_POST['password']);
    if (strlen($password) < 7) {
        $error['body'] = 'Password minimum length is 7.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }

    //checking if email already exists.
    $email = filterText($_POST['email']);
    $valudate = find_user_by_email($email);
    if ($valudate) {
        $error['body'] = 'Email already taken.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }

    $name = filterText($_POST['name']);
    $address = filterText($_POST['address']);
    $phone = filterText($_POST['phone']);

    $user = signup_new_user($name, $email, ($password), $address, $phone, time());
    if ($user) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "You have successfully signup.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        redirect('login');
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} catch (Exception $ex) {
    throwError();
}