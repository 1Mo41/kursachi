<div class="menu">
    <?php
    foreach ($carton as $carto) {
        $img = $carto->photo;
        echo '<div class="block">';
        echo "<img class='img' src=/kursachi/public/{$img} alt='Фото' >";
        echo "<input type='hidden' name='id' value=' . $carto->id .  '/>";
        echo '<p  class="p">Название: ' . $carto->nameIng . '</p>';
        echo '<p  class="p">Вес: ' . $carto->ves . '</p>';
        echo '<p  class="p">Цена: ' . $carto->price . '</p>';
        echo '<p  class="p">Описание: ' . $carto->description . '</p>';
        echo '</div>';


    ?>
        <button><a style="text-decoration: none; color: black" href="<?= app()->route->getUrl('/proverkaAdmina?del=' . "$carto[id]") ?>">Удалить блюдо</a></button>

       <?php ?>
     <?php

    }
    ?>
</div>
