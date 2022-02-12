<?php
session_start();
require_once "./db.php";
if (!isAdmin()) Die("Давай досвидания. Ты не админ!");

$order_id = $_GET['order_id'];
$status_id = $_GET['status_id'];
mysqli_query($db, "UPDATE orders SET status_id = '$status_id' WHERE id = '$order_id'");
header("location: {$_SERVER['HTTP_REFERER']}");
