<?php

function db_connect() {
    $db['host'] = "localhost";
    $db['username'] = "root";
    $db['password'] = "System123";
    $db['db_name'] = "note_book";

    $conn = new mysqli($db['host'], $db['username'], $db['password'], $db['db_name']);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
