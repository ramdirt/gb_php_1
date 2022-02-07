<?php
require 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {
    $action = $_POST['action'];
    $id = !empty($_POST['id']) ? $_POST['id'] : null;
    $name = !empty($_POST['name']) ? strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name']))) : '';
    $text = !empty($_POST['text']) ? strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['text']))) : '';

    switch ($action) {
        case 'add':
            addComment($db, $id, $name, $text);
            break;
        case 'update':
            updateComment($db, $id, $name, $text);
            break;
        case 'delete':
            deleteComment($db, $id);
            break;
    }
} elseif ($method === "GET") {
    $id = (int)$_GET['id'];
    getComments($db, $id);
}


function addComment($db, $id, $name, $text) {

    $date = date("Y-m-d");

    mysqli_query($db, "INSERT INTO comments (id, product_id, name, text, date) VALUES (NULL, '$id', '$name', '$text', '$date')");

    $res = [
        "status" => true,
    ];
    echo json_encode($res);
}

function deleteComment($db, $id) {

    mysqli_query($db, "DELETE FROM comments WHERE id = '$id'");

    $res = [
        "status" => true,
    ];
    echo json_encode($res);
}

function updateComment($db, $id, $name, $text) {

    $date = date("Y-m-d");
    mysqli_query($db, "UPDATE comments SET name = '$name', text = '$text', date = '$date' WHERE id = '$id'");

    $res = [
        "status" => true,
    ];
    echo json_encode($res);
}

function getComments($db, $id) {

    $data = mysqli_query($db, "SELECT * FROM comments WHERE product_id = '$id' ORDER BY id DESC");

    $comments = array();
    while($row = mysqli_fetch_assoc($data)) {
        $comments[] = $row;
    }

    $res = [
        "status" => true,
        "data" => $comments
    ];
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}