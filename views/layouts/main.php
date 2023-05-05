<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/kursachi/public/Style/Style.css">
    <title>last day</title>
</head>
<body>
<header>
    <nav class="header">
        <div class="User">


        </div>
        <div class="menu">
            <?php
            if (!app()->auth::check()):
                ?>
                <a class="list" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                <a class="list" href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
            <?php
            elseif(app()->auth::check() && app()->auth::user()->isAdmin()):
                ?>
                <a>Вы зашли под пользователем: <b>(<?= app()->auth::user()->name ?>)</b></a>
                <a class="add" href="<?= app()->route->getUrl('/proverka') ?>">Меню</a>
                <a  href="<?= app()->route->getUrl('/add_menu') ?>">Добавить меню</a>
                <a class="add" href="<?= app()->route->getUrl('/hello') ?>">Поиск по меню </a>
                <a class="add" href="<?= app()->route->getUrl('/add_reviews') ?>">Написить отзыв </a>
                <a class="add" href="<?= app()->route->getUrl('/reviews') ?>">Отзывы </a>
            <?php
            endif;
            ?>

            <a class="vixod" href="<?= app()->route->getUrl('/logout') ?>">Выход </a>

        </div>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>