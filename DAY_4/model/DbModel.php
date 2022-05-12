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
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function signup_new_user($name, $email, $password, $address, $phone, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (name,email,password,address,phone,create_date) values(?, ?, ?, ?, ?,?)");
    $stmt->bind_param('sssssi', $name, $email, $password, $address, $phone, $create_date);
    if ($stmt->execute()) {
        return $conn;
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
    if ($stmt->execute()) {
        return $conn;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function update_note($id, $title, $description) {
    $conn = db_connect();
    $update = "Update notes set title='$title', description='$description' where id=$id and fk_user_id=" . $_SESSION['user_id'];
    $result = $conn->query($update);
    if ($result) {
        return $conn;
    } else {
        $conn->close();
        return false;
    }
}

function find_note_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM notes where id=$id limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function delete_note_by_id($id) {
    $conn = db_connect();
    $sql = "Delete from notes where id=$id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}
