<?php
require 'db.php';

function updateDB() {
    global $db;

    $files = scandir(__DIR__ . '/gallery_img/big/');
    $files = array_splice($files, 2);


    foreach ($files as $file) {
        $filesize = filesize("./gallery_img/big/$file");
        if(!mysqli_query($db, "SELECT * FROM image WHERE filename == '$file'")) {
            mysqli_query($db, "INSERT INTO image (id, filename, rating, filesize) VALUES (NULL, '$file', 0, $filesize)");
        }
    }
    header("Location: index.php");
}

updateDB();