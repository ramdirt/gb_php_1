<?php
require "./classSimpleImage.php";
require '../db.php';

function redirect($status) {
    header("Location: ../index.php?message=" . $status);
}

if(!empty($_FILES)) {
    if($_FILES["image"]["error"] == 4) {
        redirect('no_file');
        die();
    }

    if ($_FILES["image"]["type"] !== "image/jpeg") {
        redirect('type');
        die();
    }
    if ($_FILES["image"]["size"] > 500000) {
        redirect('size');
        die();
    }

    $tmp = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    $path = __DIR__ . "/gallery_img/big/{$name}";

    if (move_uploaded_file($tmp, $path)) {

        $image = new SimpleImage();
        $image->load($path);
        $image->resize(150,100);
        $image->save(__DIR__ . "/gallery_img/small/{$name}");

        if(!mysqli_query($db, "SELECT * FROM image WHERE filename == '$name'")) {
            $filesize = $_FILES["image"]["size"];
            mysqli_query($db, "INSERT INTO image (id, filename, rating, filesize) VALUES (NULL, '$name', 0, $filesize)");
            redirect('ok');
        }

        redirect('duplicate');
    } else {
        redirect('error');
    };
}
