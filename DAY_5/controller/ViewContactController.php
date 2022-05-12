<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';

if (!empty($_GET['id'])) {
    $contactResult = find_contact_by_id($_GET['id'], $_SESSION["user_id"]);
    if ($contactResult) {
        $contactData = [];
        while ($cr = $contactResult->fetch_assoc()) {
            $contactData["contact_id"] = $cr["contact_id"];
            $contactData["name"] = $cr["name"];
            $contactData["email"] = $cr["email"];
            $contactData["address"] = $cr["address"];
            $contactData["create_date"] = $cr["create_date"];
            $contactData["number"][] = $cr["number"];
        }
        include 'view/contact_view.php';
    } else {
        throwError(404, 'Requested page does not exists.');
    }
} else {
    throwError(404, 'Requested page does not exists.');
}



