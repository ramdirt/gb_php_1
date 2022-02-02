<?php
require 'db.php';

if(isset($_POST) && !$_GET) {
    $data = json_decode(file_get_contents('php://input'), true);
    updateRating($data['id']);
}

function updateRating($id) {
    global $db;
    mysqli_query($db, "UPDATE image SET rating = rating + 1 WHERE id = '$id'");
}