<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';



if (!empty($_GET['id'])) {
    $note = find_note_by_id($_GET['id']);
    if ($note) {
        $noteData = $note->fetch_assoc();
        if (empty($_POST)) {
            include 'view/note_update.php';
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
                redirect('update-note', ['id' => $noteData['id']]);
                return;
            }

            $title = filterText($_POST['title']);
            $description = filterText($_POST['description']);
            $fk_user_id = $_SESSION['user_id'];
            $note = update_note($noteData['id'], $title, $description);
            if ($note) {
                $msg['title'] = 'Success!!';
                $msg['body'] = "You have successfully updated note.";
                $msg['type'] = 'success';
                setFlash('message', $msg);
                redirect("view-note", ['id' => $noteData['id']]);
            } else {
                throwError(500, 'Unable to complete your request.');
            }
        } catch (Exception $ex) {
            throwError();
        }
    } else {
        throwError(404, 'Requested page does not exists.');
    }
} else {
    throwError(404, 'Requested page does not exists.');
}



