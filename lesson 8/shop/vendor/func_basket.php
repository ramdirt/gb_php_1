<?php
session_start();
require_once 'db.php';
require_once './sign/responce.php';

$method = $_SERVER['REQUEST_METHOD'];
$user_id = (int)$_SESSION['user']['id'];

if ($method === "POST") {
    $action = $_POST['action'];
    $id = (int)$_POST['id'];

    switch ($action) {
        case 'add':
            addProduct($db, $user_id, $id);
            break;
        case 'delete':
            deleteProduct($db, $user_id, $id);
            break;
    }
}

function addProduct($db, $user_id, $id) {
    $sql = "INSERT INTO basket (id, user_id, product_id) VALUES (NULL, '$user_id', '$id')";
    mysqli_query($db, $sql);
    responce(true);
}

function deleteProduct($db, $user_id, $id) {
    $sql = "DELETE FROM basket WHERE id = '$id' AND user_id = '$user_id'";
    mysqli_query($db, $sql);
    responce(true);
}