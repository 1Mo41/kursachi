<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
</head>
<body>
<main>
    <h2 class="centr">Изменение</h2>

    <form method="post" enctype="multipart/form-data" action="/kursachi/update">
        <div class="zapros">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Название<br> <input type="text" value="<?= $carton['nameIng'] ?>" name="nameIng"></label>
            <label>Цена <br><input type="text" value="<?= $carton['price'] ?>"name="price"></label>
            <label>Вес <br><input type="text" value="<?= $carton['ves'] ?>"name="ves"></label>
            <label>Описание<br><input type="text"value="<?= $carton['description'] ?>" name="description"></label>
            <label>Тип блюда
                <select name="typeDishId" >
                    <?php
                    foreach ($typeDish as $typeDis){
                        echo "<option value=\"$typeDis->typeDishId\">" . $typeDis->name . '</option>';
                    }
                    ?>
                </select>
            </label>
            <input  type="file" value="<?= $carton['photo'] ?>" name="photo">
            <button>Добавить</button>
        </div>
    </form>

</main>
</body>
</html>