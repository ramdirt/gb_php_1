<?php
function redirect($status) {
    header("Location: index.php?message=" . $status);
}

if(!empty($_FILES)) {
    if ($_FILES["image"]["type"] !== "image/jpeg") {
        redirect('type');
        die();
    }
    if ($_FILES["image"]["size"] > 500000) {
        redirect('size');
        die();
    }

    $tmp = $_FILES["image"]["tmp_name"];
    $name = time() . $_FILES["image"]["name"];
    $path = __DIR__ . "/gallery_img/big/{$name}";

    if (move_uploaded_file($tmp, $path)) {
        include "./classSimpleImage.php";
        $image = new SimpleImage();
        $image->load($path);
        $image->resize(150,100);
        $image->save(__DIR__ . "/gallery_img/small/{$name}");

        redirect('ok');
    } else {
        redirect('error');
    };
}
