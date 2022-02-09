<?php
require 'db.php';

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
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 text-center">
            <img class="img-thumbnail mb-3" src="./img/big/<?=$product['img']?>"/>
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
                <button class="btn btn-danger">Добавить в корзину</button>
            </div>
            <div class="row justify-content-center mt-4 mb-5">
                <div class="row">
                    <div class="card">
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
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="./main.js"></script>
</body>
</html>
