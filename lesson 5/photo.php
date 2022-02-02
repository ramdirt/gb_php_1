<?php
require 'db.php';
require 'update_rating.php';

global $db;

$id = (int)$_GET['id'];
$photo = mysqli_query($db, "SELECT * FROM image WHERE id = '$id'");
$photo = mysqli_fetch_assoc($photo);

updateRating($id);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?=$photo['filename']?></title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <a href="./index.php" class="btn btn-sm btn-outline-primary">Обратно на главную</a>
                <img class="img-thumbnail m-3" src="gallery_img/big/<?=$photo['filename']?>"/>
                <p>Популярность: <span class="badge bg-danger"><?=$photo['rating']?></span></p>
            </div>
        </div>
    </div>
</body>
</html>
