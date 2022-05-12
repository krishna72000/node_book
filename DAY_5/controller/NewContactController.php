<?php

include 'Helper/SessionHelper.php';

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/new_contact.php';
    return;
}

try {
    $flag = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['number']);

    //validate user inputdata
    if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/new_contact.php';
        return;
    }

    $name = filterText($_POST['name']);
    $email = filterText($_POST['email']);
    $address = filterText($_POST['address']);
    $number = $_POST["number"];
    $fk_user_id = $_SESSION['user_id'];
    $contact = create_contact($name, $email, $address, $number, $fk_user_id, time());
    if ($contact) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "You have successfully created new contact.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        redirect("view-contact", ['id' => $contact]);
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} catch (Exception $ex) {
    throwError();
}