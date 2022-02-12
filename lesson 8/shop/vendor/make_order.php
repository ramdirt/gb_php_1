<?php
session_start();
require_once 'db.php';
require_once './sign/responce.php';

if(!$_SESSION['user']) {
    header('location: ./auth.php');
}

$id = $_SESSION['user']['id'];

$sql = "SELECT basket.id, basket.product_id, basket.quantity, products.price, products.title FROM basket JOIN products ON basket.product_id = products.id WHERE user_id = '$id' GROUP BY basket.id";
$data = mysqli_query($db, $sql);

$products = array();
while($row = mysqli_fetch_assoc($data)) {
    $products[] = $row;
}

$order_id = mysqli_query($db, "SELECT id FROM orders ORDER BY id DESC LIMIT 1");
$order_id = mysqli_fetch_assoc($order_id);


function make_order($db, $user_id, $products, $order_id) {
    mysqli_query($db, "INSERT INTO orders (id, user_id, status_id) VALUES (NULL, '$user_id', 1)");

    $sql = "INSERT INTO orders_details (id, order_id, product_id, product_name, price, quantity) VALUES ";
    foreach ($products as $key => $values) {
        $sql .= "(NULL, {$order_id['id']}, {$values['product_id']}, '{$values['title']}', {$values['price']}, {$values['quantity']}),";
    }
    $sql = mb_substr($sql, 0, -1) . ';';
    mysqli_query($db, $sql);

    mysqli_query($db, "DELETE FROM basket WHERE user_id = '$user_id'");
}

make_order($db, $id, $products, $order_id);
header('location: ../index.php');