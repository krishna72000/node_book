<?php

include 'Helper/SessionHelper.php';

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/new_note.php';
    return;
}

try {
    $flag = empty($_POST['title']) || empty($_POST['description']);

    //validate user inputdata
    if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/new_note.php';
        return;
    }

    $title = filterText($_POST['title']);
    $description = filterText($_POST['description']);
    $fk_user_id = $_SESSION['user_id'];
    $note = create_note($title, $description, $fk_user_id, time());
    if ($note) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "You have successfully created new note.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        redirect("view-note", ['id' => $note->insert_id]);
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} catch (Exception $ex) {
    throwError();
}