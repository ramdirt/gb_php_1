<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $check_user = mysqli_query($connect, $sql);

    if(mysqli_num_rows($check_user) === 1) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email']
         ];

        header('location: ../index.php');

    } else {
        $_SESSION['message'] = 'Логин или пароль не совпадают';
        header('location: ../auth.php');
    }
