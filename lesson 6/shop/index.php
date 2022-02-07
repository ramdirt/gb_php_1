<?php
require 'db.php';

$data = mysqli_query($db, "SELECT * FROM products");

$products = array();
while($row = mysqli_fetch_assoc($data)) {
    $products[] = $row;
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2>Каталог товаров</h2>
<div class="d-flex flex-wrap justify-content-between">
    <?php foreach($products as $product):?>
        <div class="card m-2 text-center" style="width: 15rem;">
            <img src="./img/small/<?=$product['img']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$product['title']?></h5>
                <p class="cart-text">Стоимость: $<?=$product['price']?></p>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                    <button data-id="<?=$product['id']?>" class="btn btn-sm btn-outline-danger">В корзину</button>
                    <a href="./product.php?id=<?=$product['id']?>" class="btn btn-sm btn-outline-primary">Подробнее</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
