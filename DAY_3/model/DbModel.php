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

function find_user_by_email($email) {
    $conn = db_connect();
    $sql = "SELECT * FROM user where email='$email' limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function signup_new_user($name, $email, $password, $address, $phone, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (name,email,password,address,phone,create_date) values(?, ?, ?, ?, ?,?)");
    $stmt->bind_param('sssssi', $name, $email, md5($password), $address, $phone, $create_date);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
//        return false;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function db_login($email, $password) {

    $conn = db_connect();
    $sql = "SELECT id,name FROM user where email='$email' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function my_note_list() {
    $conn = db_connect();
    $sql = "SELECT * FROM notes where fk_user_id=" . $_SESSION["user_id"];
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function create_note($title, $description, $fk_user_id, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO notes (title,description,fk_user_id,create_date) values(?, ?, ?, ?)");
    $stmt->bind_param('ssii', $title, $description, $fk_user_id, $create_date);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}
