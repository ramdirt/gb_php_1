<?php
$db = mysqli_connect('localhost', 'root','', 'shop_db');
if(!$db) {
    die("DB error connect");
}
function isAdmin() {
    return $_SESSION['user']['login'] == 'admin' ? true : false;
}