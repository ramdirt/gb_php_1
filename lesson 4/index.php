<?php

$files = scandir(__DIR__ . '/gallery_img/big/');
$files = array_splice($files, 2);

function image($name) {
    return "<a rel=\"gallery\" class=\"photo\" href=\"gallery_img/big/{$name}\"><img src=\"gallery_img/small/{$name}\" width=\"150\" height=\"100\" /></a>";
}

function gallery($files) {
    $result = array();
    foreach ($files as $name) {
        $result[] = image($name);
    }
    return join($result);
}

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Ошибка загрузки',
    'size' => 'Размер файла больше чем 0.5мб',
    'type' => 'Неверный тип файла, требуется JPEG'
];
$message = $messages[$_GET['message']];

include "template.html";