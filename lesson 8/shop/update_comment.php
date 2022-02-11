<?php
require './vendor/db.php';

if (!empty($_GET)) {
    $id = (int)$_GET['id'];
    $product = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM comments WHERE id = '$id'"));
} else {
    header('location: index.php');
}

$name = !empty($product) ? $product['name']: '';
$text = !empty($product) ? $product['text']: '';
$product_id = !empty($product) ? $product['product_id']: '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update comment</title>
</head>
<body>
    <div class="container mt-5">
        <a href="./product.php?id=<?=$product_id?>" class="btn btn-sm btn-outline-primary mb-5">Обратно к товару</a>
        <form id="formUpdateComment" data-id="<?=$id?>">
            <div class="row g-3">

                <div class="col-6">
                    <label for="firstName" class="form-label">Ваше имя</label>
                    <input id="nameComment" type="text" class="form-control" id="firstName" placeholder="Иван Иванов" value="<?=$name?>" required="">
                </div>

                <div class="col-12 mb-1">
                    <label for="comment" class="form-label">Комментарий</label>
                    <textarea id="textComment" type="text" class="form-control" id="comment" placeholder="Расскажите о товаре"><?=$text?></textarea>
                    <button class="btn btn-secondary mt-3">Обновить комментарий</button>
                </div>

            </div>
        </form>
    </div>
    <script src="./assets/js/comments.js"></script>
</body>
</html>
