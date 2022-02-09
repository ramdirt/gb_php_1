<?php
    session_start();
    require_once 'connect.php';
    require_once 'responce.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $error = array();
    if($login === '') {
        $error[] = 'login';
    }
    if($password === '') {
        $error[] = 'password';
    }
    if(!empty($error)) {
        responce(false, $error);
        die();
    }

    $password = md5($password);


    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $check_user = mysqli_query($connect, $sql);

    if(mysqli_num_rows($check_user) === 1) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email']
         ];

        responce(true, 'Авторизация прошла успешно');
    } else {
        responce(false, 'Логин или пароль не верны');
    }
