
<form method="post" action="/kursachi/proverka" class="sort">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <select  name="search2" class="yes" >
        <option >Горячее</option>
        <option >Напитки</option>
        <option >Десерты</option>
    </select>

    <button>Выбрать</button>
</form>
<?php 

?>
<div class="menu">
    <?php
    foreach ($carton as $carto){
        $img = $carto->photo;
        echo '<div class="block">';
        echo "<img class='img' src=/kursachi/public/{$img} alt='Фото' >";
        echo '<p  class="p">Название: ' . $carto->nameIng. '</p>';
        echo '<p  class="p">Вес: ' . $carto->ves. '</p>';
        echo '<p  class="p">Цена: ' . $carto->price. '</p>';
        echo '<p  class="p">Описание: ' . $carto->description. '</p>';
        echo '</div>';

    }
    ?>
</div>
