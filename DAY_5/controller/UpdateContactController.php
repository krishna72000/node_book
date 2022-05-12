<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';



if (empty($_GET['id'])) {
    throwError(404, 'Requested page does not exists.');
}

$contactResult = find_contact_by_id($_GET['id'], $_SESSION["user_id"]);
if (empty($contactResult)) {
    throwError(404, 'Requested page does not exists.');
}

if (empty($_POST)) {
    $contactData = [];
    while ($cr = $contactResult->fetch_assoc()) {
        $contactData["contact_id"] = $cr["contact_id"];
        $contactData["name"] = $cr["name"];
        $contactData["email"] = $cr["email"];
        $contactData["address"] = $cr["address"];
        $contactData["create_date"] = $cr["create_date"];
        $contactData["number"][] = $cr["number"];
    }
    include 'view/contact_update.php';
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
        include 'view/contact_update.php';
        return;
    }
    $name = filterText($_POST['name']);
    $email = filterText($_POST['email']);
    $address = filterText($_POST['address']);
    $number = $_POST["number"];
    $fk_user_id = $_SESSION['user_id'];
    $contact = update_contact($_GET['id'], $name, $email, $address, $number, $fk_user_id);
    if ($contact) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "You have successfully updated contact.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        redirect("view-contact", ['id' => $contact]);
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} catch (Exception $ex) {
    throwError();
}


