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
    <form>
        <div class="row g-3">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder="name" value="">
                    <label>Введите свое имя</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control" placeholder="login" value="">
                    <label>Введите логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control"  placeholder="email" value="">
                    <label>Введите почту</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label>Введите пароль</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Password">
                    <label>Введите еще раз пароль</label>
                </div>
                <div class="mt-3 g-3">
                    <button class="btn btn-primary btn-register mb-3">Зарегистрироваться</button>
                    <a href="auth.php" class="btn btn-outline-primary mb-3">У вас уже есть аккаунт?</a>
                </div>
                <div class="bg-warning mt-3">
                    <p class="message"></p>
                </div>
            </div>


        </div>
    </form>
</div>

<script src="./assets/js/main.js"></script>
</body>
</html>
