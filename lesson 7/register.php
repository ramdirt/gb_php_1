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
    <form action="./vendor/signup.php" method="post" id="formAddComment">
        <div class="row g-3">
            <div class="col-5">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder="name" value="Алексей">
                    <label for="floatingInput">Введите свое имя</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control" id="floatingInput" placeholder="login" value="Aleksey">
                    <label for="floatingInput">Введите логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="email" value="aleksey@mail.ru">
                    <label for="floatingInput">Введите почту</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Введите пароль</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirm" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Введите еще раз пароль</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    <a href="./auth.php" class="btn btn-outline-primary">У вас уже есть аккаунт?</a>
                </div>

                <div class="bg-warning mt-3">
                    <?php
                    if(!empty($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                </div>
            </div>


        </div>
    </form>
</div>

<script src="./assets/js/main.js"></script>
</body>
</html>
