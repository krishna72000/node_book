<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';

if (!empty($_GET['id'])) {
    $note = find_note_by_id($_GET['id']);
    if ($note) {
        $noteData = $note->fetch_assoc();
        include 'view/note_view.php';
    } else {
        throwError(404, 'Requested page does not exists.');
    }
} else {
    throwError(404, 'Requested page does not exists.');
}



