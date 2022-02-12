<?php
session_start();
require_once "./vendor/db.php";

$id = strip_tags($_GET['id']);
$data = mysqli_query($db, "SELECT orders_details.price AS price, status.name AS status, orders_details.product_name, orders_details.quantity FROM orders_details JOIN orders ON orders_details.order_id = orders.id JOIN status ON orders.status_id = status.id WHERE orders.id = '$id'");
$order = array();
while($row = mysqli_fetch_assoc($data)) {
    $order[] = $row;
}

if (isAdmin()) {
    $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT user_id FROM orders WHERE id = '$id'"));
    $user_info = mysqli_fetch_assoc(mysqli_query($db, "SELECT name, email FROM users WHERE id = '{$user['user_id']}'"));
}


$all_price = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(orders_details.price * orders_details.quantity) AS price FROM orders_details WHERE order_id = '$id'"))


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Подробности о заказе</title>
</head>
<body>
<div class="container">
    <?php require './vendor/layout/header.php' ?>
    <h1>Состав заказа №<?=$id?> <span class="badge bg-secondary"><?=$order['0']['status']?></span></h1>
    <?php if (isAdmin()): ?>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                Изминить статус заказа
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                <li><a class="dropdown-item" href="./vendor/change_status_order.php?order_id=<?=$id?>&status_id=1">Создан</a></li>
                <li><a class="dropdown-item" href="./vendor/change_status_order.php?order_id=<?=$id?>&status_id=2">В работе</a></li>
                <li><a class="dropdown-item" href="./vendor/change_status_order.php?order_id=<?=$id?>&status_id=3">Выполнен</a></li>
            </ul>
        </div>
    <?php endif; ?>
    <table class="table align-middle">
        <thead>
        <tr>
            <th scope="col">Товар</th>
            <th scope="col">Cтоимость</th>
            <th scope="col">Количество</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($order as $product):?>
            <tr>
                <td><?=$product['product_name']?></td>
                <td>$<?=$product['price']?></td>
                <td><?=$product['quantity']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <h3>Общая стоимость заказа: $<?=$all_price['price']?></h3>
    <?php if (isAdmin()): ?>
        <div>
            <h4>Информация о клиенте</h4>
            <ul>
                <li><?=$user_info['name']?></li>
                <li><?=$user_info['email']?></li>
            </ul>
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
