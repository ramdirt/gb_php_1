<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">ИМ</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="./index.php" class="nav-link" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="./basket.php" class="nav-link">Корзина</a></li>
        <? if (!empty($_SESSION['user'])): ?>
            <? if (isAdmin()): ?>
                <li class="nav-item"><a href="./admin.php" class="nav-link">Администрирование</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="./personal.php" class="nav-link">Личный кабинет</a></li>
            <? endif; ?>
            <li class="nav-item"><a href="./vendor/sign/logout.php" class="nav-link">Выйти</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="./auth.php" class="nav-link">Авторизоватся</a></li>
        <? endif; ?>

    </ul>
</header>
