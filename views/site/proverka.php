<div class="menu">
    <?php
    foreach ($menu as $men) {

        $omg = $men->photo;
        echo '<div class="block">';
        echo "<assets height='250px' width='250px' src=/kursachi/public/{$omg} alt='фото'>";
        echo '<p  class="p">Название: ' . $men->nameIng . '</p>';
        echo '<p  class="p">Вес: ' . $men->ves . '</p>';
        echo '<p  class="p">Цена: ' . $men->price . '</p>';
        echo '<p  class="p">Описание: ' . $men->description . '</p>';
        echo '</div>';

    }
    ?>
</div>
