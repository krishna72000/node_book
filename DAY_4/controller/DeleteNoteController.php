<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';

if (!empty($_GET['id'])) {
    $note = find_note_by_id($_GET['id']);
    if ($note) {
        $note = delete_note_by_id($_GET['id']);
        if ($note) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "Item successfully deleted.";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            redirect("note-list");
        } else {
            throwError(500, 'Unable to complete your request.');
        }
    } else {
        throwError(404, 'Requested page does not exists.');
    }
} else {
    throwError(404, 'Requested page does not exists.');
}
