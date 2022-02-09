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
    <form method="post" action="./vendor/signin.php" id="formAddComment">
        <div class="row g-3">
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="login" value="Aleksey">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="123">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Войти</button>
                    <a href="register.php" class="btn btn-outline-primary">Регистрация</a>
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


</body>
</html>
