<?php
session_start();
require './vendor/db.php';

$id = (int)$_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM products WHERE id = '$id'"));

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?=$product['title']?></title>
</head>
<body>
<div class="container mb-5">
    <?php require './vendor/layout/header.php' ?>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 text-center">
            <img class="img-thumbnail mb-3" src="./assets/img/big/<?=$product['img']?>"/>
        </div>
        <div class="col-sm-12 col-md-6">
            <div>
                <a href="./index.php" class="btn btn-sm btn-outline-primary">Обратно на главную</a>
                <p class="h1 mt-3"><?=$product['title']?></p>
                <p>Стоимость: <span class="badge bg-danger">$<?=$product['price']?></span></p>

                <?php if (!empty($product['description'])): ?>
                    <p><?=$product['description']?></p>
                <?php else: ?>
                    <p>Описания нет</p>
                <?php endif; ?>
                <?php if (!empty($_SESSION['user'])): ?>
                    <button data-id="<?=$product['id']?>" class="btn btn-danger btn-add-basket">Добавить в корзину</button>
                <?php else: ?>
                    <p>Авторизуйтесь чтобы купить</p>
                    <a href="./auth.php" class="btn btn-outline-primary">Авторизоватся</a>
                <?php endif; ?>
            </div>
            <div class="row justify-content-center mt-4 mb-5">
                <div class="row">
                    <div class="card">
                        <?php if (!empty($_SESSION['user'])): ?>
                        <h4 class="mb-3 mt-2">Оставить комментарий</h4>
                        <form id="formAddComment" data-id="<?=$id?>">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label for="firstName" class="form-label">Ваше имя</label>
                                    <input id="nameComment" type="text" class="form-control" id="firstName" placeholder="Иван Иванов" value="" required="">
                                </div>

                                <div class="col-12 mb-1">
                                    <label for="comment" class="form-label">Комментарий</label>
                                    <textarea id="textComment" type="text" class="form-control" id="comment" placeholder="Расскажите о товаре">Отличный товар</textarea>
                                    <button class="btn btn-secondary mt-3">Оставить комментарий</button>
                                </div>

                            </div>
                        </form>
                        <hr>

                        <div id="comments" class="mt-2 mb-2">
                            <!-- с помощью JS здесь появятся комменты -->
                        </div>
                        <?php else: ?>
                            <p class="mt-3">Авторизуйтесь чтобы видеть и оставлять комментарии</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="./assets/js/comments.js"></script>
<script src="./assets/js/basket.js"></script>
</body>
</html>
