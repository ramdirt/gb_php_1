<?php
    session_start();
    require_once 'connect.php';
    require_once 'responce.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

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
        mysqli_query($connect, $sql);

        responce(true);
    } else {
        responce(false, 'password_confirm');
    }
