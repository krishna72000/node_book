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

function my_contact_list($user_id) {
    $conn = db_connect();
    $sql = "SELECT contact.id as contact_id,name,address,email,number,create_date FROM contact LEFT JOIN phone ON phone.fk_contact_id=contact.id where fk_user_id=" . $user_id . " order by contact.id";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function create_contact($name, $email, $address, $number, $fk_user_id, $create_date) {
    $conn = db_connect();
    $conn->begin_transaction();
    $stmt = $conn->prepare("INSERT INTO contact (name,email,address,fk_user_id,create_date) values(?, ?, ?, ?, ?)");
    $stmt->bind_param('sssii', $name, $email, $address, $fk_user_id, $create_date);
    $flag = TRUE;
    $last_id = NULL;
    if ($stmt->execute()) {
        $last_id = $conn->insert_id;
        foreach ($number as $num) {
            $stmt2 = $conn->prepare("INSERT INTO phone (number,fk_contact_id) values(?, ?)");
            $stmt2->bind_param('si', $num, $last_id);
            if (!$stmt2->execute()) {
                $flag = FALSE;
            }
        }
    } else {
        $flag = FALSE;
    }
    if ($flag) {
        $conn->commit();
        return $last_id;
    } else {
        $conn->rollback();
        $stmt->close();
        $conn->close();
        return false;
    }
}

function update_contact($id, $name, $email, $address, $number, $fk_user_id) {
    $conn = db_connect();
    $flag = TRUE;
    $conn->begin_transaction();
    $conn->query("DELETE FROM phone WHERE fk_contact_id=" . $id);
    $update = $conn->query("Update contact set name='$name', email='$email',address='$address' where id=$id and fk_user_id=" . $fk_user_id);
    if ($update) {
        foreach ($number as $num) {
            $insert = "INSERT INTO phone (number,fk_contact_id) values('$num', $id)";
            if (!$conn->query($insert)) {
                $flag = FALSE;
            }
        }
    } else {
        $flag = FALSE;
    }
    if ($flag) {
        $conn->commit();
        return $id;
    } else {
        $conn->rollback();
        $conn->close();
        return false;
    }
}

function find_contact_by_id($id, $user_id) {
    $conn = db_connect();
    $sql = "SELECT contact.id as contact_id,name,address,email,number,create_date FROM contact LEFT JOIN phone ON phone.fk_contact_id=contact.id where contact.id=" . $id . " AND fk_user_id=" . $user_id . " order by contact.id";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function delete_contact_by_id($id, $user_id) {
    $conn = db_connect();
    $conn->begin_transaction();
    $sql = "Delete from phone where fk_contact_id=" . $id;
    $conn->query($sql);
    $conn->query("DELETE FROM contact WHERE id=" . $id . " AND fk_user_id=" . $user_id);
    if ($conn->affected_rows > 0) {
        $conn->commit();
        $conn->close();
        return TRUE;
    } else {
        $conn->rollback();
        $conn->close();
        return false;
    }
}

function search_contact_list($key, $user_id) {
    $conn = db_connect();
    $sql = "SELECT contact.id as contact_id,name,address,email,number,create_date FROM contact LEFT JOIN phone ON phone.fk_contact_id=contact.id where (name LIKE '%$key%' OR address LIKE '%$key%' OR number LIKE '%$key%' OR email LIKE '%$key%') AND fk_user_id=" . $user_id . " order by contact.id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
