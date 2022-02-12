<?php
session_start();
require_once "./vendor/db.php";

$user_id = $_SESSION['user']['id'];
$data = mysqli_query($db, "SELECT orders.id AS id, orders.user_id AS user_id, SUM(orders_details.price) AS price, status.name AS status FROM orders_details JOIN orders ON orders_details.order_id = orders.id JOIN status ON orders.status_id = status.id WHERE orders.user_id = '$user_id' GROUP BY orders.id");

$orders = array();
while($row = mysqli_fetch_assoc($data)) {
    $orders[] = $row;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Админка</title>
</head>
<body>
    <div class="container">

        <?php require './vendor/layout/header.php' ?>
        <h1>Личный кабинет</h1>
        <h3>Мои заказы</h3>
        <table class="table align-middle">
            <thead>
            <tr>
                <th scope="col">Номер заказа</th>
                <th scope="col">Общая стоимость</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order):?>
                <tr>
                    <th scope="row"><?=$order['id']?></th>
                    <td><?=$order['price']?></td>
                    <td><?=$order['status']?></td>
                    <td><a href="./order_details.php?id=<?=$order['id']?>" class="btn btn-sm btn-outline-primary">Подробнее</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</body>
</html>
