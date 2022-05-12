<?php

include 'Helper/SessionHelper.php';
include 'model/DbModel.php';

$noteData = my_note_list();

include 'view/note_list.php';