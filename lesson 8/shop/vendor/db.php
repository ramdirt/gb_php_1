<?php
$db = mysqli_connect('localhost', 'root','', 'shop_db');
if(!$db) {
    die("DB error connect");
}