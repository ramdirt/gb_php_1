<?php

$connect = mysqli_connect('localhost', 'root', '', 'shop_db');
if (!$connect) {
    die("DB error connect");
}