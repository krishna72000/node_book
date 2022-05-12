<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';

if (!empty($_GET['id'])) {
    $flag = delete_contact_by_id($_GET['id'], $_SESSION["user_id"]);
    if ($flag) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "Item successfully deleted.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        redirect("contact-list");
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} else {
    throwError(404, 'Requested page does not exists.');
}
