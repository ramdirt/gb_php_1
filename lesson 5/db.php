<?php
$db = mysqli_connect('localhost', 'root','', 'db_gallery');
global $db;
if(!$db) {
    die("DB error connect");
}