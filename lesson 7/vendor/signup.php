<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if($password === $password_confirm) {

        $password = md5($password);

        $sql = "INSERT INTO users (id, name, login, email, password) VALUES (NULL, '$name', '$login', '$email', '$password')";
        mysqli_query($connect, $sql);

        $_SESSION['message'] = 'Вы зарегистрировались';
        header('location: ../auth.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('location: ../register.php');

        /*
        $res = [
            "status" => true,
        ];
        echo json_encode($res);
         */
    }
