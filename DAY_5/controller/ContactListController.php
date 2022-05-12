<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';


if (empty($_GET["search"])) {
    $contactResult = my_contact_list($_SESSION["user_id"]);
} else {
    $contactResult = search_contact_list(filterText($_GET["search"]), $_SESSION["user_id"]);
}

$contactData = [];
if ($contactResult) {
    while ($cr = $contactResult->fetch_assoc()) {
        $contactData[$cr["contact_id"]]["contact_id"] = $cr["contact_id"];
        $contactData[$cr["contact_id"]]["name"] = $cr["name"];
        $contactData[$cr["contact_id"]]["email"] = $cr["email"];
        $contactData[$cr["contact_id"]]["address"] = $cr["address"];
        $contactData[$cr["contact_id"]]["create_date"] = $cr["create_date"];
        $contactData[$cr["contact_id"]]["number"][] = $cr["number"];
    }
}

include 'view/contact_list.php';
