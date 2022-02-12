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
    $product = mysqli_query($db, "SELECT * FROM basket WHERE user_id = '$user_id' AND product_id = '$id'");
    if (mysqli_num_rows($product) == 0) {
        $sql = "INSERT INTO basket (id, user_id, product_id, quantity) VALUES (NULL, '$user_id', '$id', 1)";
        mysqli_query($db, $sql);
        responce(true, 'товар добавлен');
    } else {
        mysqli_query($db, "UPDATE basket SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$id'");
        responce(true, 'значение увеличино');
    }

}

function deleteProduct($db, $user_id, $id) {
    $sql = "DELETE FROM basket WHERE id = '$id' AND user_id = '$user_id'";
    mysqli_query($db, $sql);
    responce(true);
}