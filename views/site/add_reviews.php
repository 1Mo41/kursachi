<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/style/style.css">
    <title>Pop it MVC</title>
</head>
<body>
<main>
    <h2 class="centr">Отставить отзыв</h2>

    <form method="post">
        <div class="zapros">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Автор<br> <input type="text" name="author"></label>
            <label>Содержимое <br><input type="text" name="content"></label>
            <label>Рейтинг
                <select class="prof" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option><br> </select>
            </label> <br>
            <button>Добавить</button>
        </div>
    </form>
</main>
</body>
</html>