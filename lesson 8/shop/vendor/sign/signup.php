<?php
    session_start();
    require_once 'responce.php';
    require_once '../db.php';

    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['login'])));
    $email = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['email'])));
    $password = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['password'])));
    $password_confirm = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['password_confirm'])));

    $error = array();
    if($name === '') {
        $error[] = 'name';
    }
    if($login === '') {
        $error[] = 'login';
    }
    if($email === '') {
        $error[] = 'email';
    }
    if($password === '') {
        $error[] = 'password';
    }
    if($password_confirm === '') {
        $error[] = 'password_confirm';
    }
    if(!empty($error)) {
        responce(false, $error);
        die();
    }

    if($password === $password_confirm) {

        $password = md5($password);

        $sql = "INSERT INTO users (id, name, login, email, password) VALUES (NULL, '$name', '$login', '$email', '$password')";
        mysqli_query($db, $sql);

        responce(true);
    } else {
        responce(false, 'password_confirm');
    }
