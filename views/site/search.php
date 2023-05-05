<div class="menu">
    <?php
    foreach ($cartons as $carton){

        echo '<div class="block">';
        echo '<p  class="p">Название: ' . $carton->nameIng. '</p>';
        echo '<p  class="p">Вес: ' . $carton->ves. '</p>';
        echo '<p  class="p">Цена: ' . $carton->price. '</p>';
        echo '<p  class="p">Описание: ' . $carton->description. '</p>';
        echo '</div>';

    }
    ?>
</div>
