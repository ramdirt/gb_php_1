<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <form id="formAddComment" class="formAuth">
        <div class="row g-3">
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="name@example.com" name="login" >
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary btn-login mb-2">Войти</button>
                    <a href="register.php" class="btn btn-outline-primary mb-2">Регистрация</a>
                </div>
                <div class="bg-warning mt-3">
                    <p class="message"></p>
                </div>
            </div>

        </div>

    </form>
</div>

<script src="assets/js/auth.js"></script>
</body>
</html>
