<?php
session_start();
require './vendor/db.php';
if(!$_SESSION['user']) {
    header('location: ./auth.php');
}

$id = $_SESSION['user']['id'];

$sql = "SELECT basket.id, basket.product_id, basket.quantity, products.price, products.img, products.title FROM basket JOIN products ON basket.product_id = products.id WHERE user_id = '$id' GROUP BY basket.id";
$data = mysqli_query($db, $sql);

$products = array();
while($row = mysqli_fetch_assoc($data)) {
    $products[] = $row;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php require './vendor/layout/header.php' ?>
    <h2>Корзина</h2>
    <div class="d-flex flex-wrap justify-content-between">
        <?php foreach($products as $product):?>
            <div class="card m-2 text-center" style="width: 13rem;">
                <img src="./assets/img/small/<?=$product['img']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$product['title']?></h5>
                    <p class="cart-text">Стоимость: $<?=$product['price']?></p>
                    <p class="cart-text">Количество: <?=$product['quantity']?></p>
                </div>
                <div class="card-footer">
                    <button data-id="<?=$product['id']?>" href="#" class="btn btn-sm btn-outline-danger btn-delete-basket">Удалить</button>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <hr>
    <div>
        <a href="./vendor/make_order.php" class="btn btn-danger">Оформить заказ</a>
    </div>
</div>


<script src="./assets/js/basket.js"></script>
</body>
</html>
