<?php
require 'db.php';

global $db;
$image = mysqli_query($db, "SELECT * FROM image ORDER BY rating DESC");

$result = array();
while($row = mysqli_fetch_assoc($image)) {
    $result[] = $row;
}

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Ошибка загрузки',
    'size' => 'Размер файла больше чем 0.5мб',
    'type' => 'Неверный тип файла, требуется JPEG',
    'duplicate' => 'Картинка с таким названием уже есть',
    'no_file' => 'Нет файла'
];

$message = isset($_GET['message'])? $messages[$_GET['message']]: '';

include 'template.html';