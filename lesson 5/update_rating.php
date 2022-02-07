<?php
require 'db.php';

if(isset($_POST) && !$_GET) {
    $data = json_decode(file_get_contents('php://input'), true);
    updateRating($db, $data['id']);
}

function updateRating($db, $id) {
    mysqli_query($db, "UPDATE image SET rating = rating + 1 WHERE id = '$id'");
}