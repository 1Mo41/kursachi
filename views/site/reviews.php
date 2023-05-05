<div class="menu">
    <?php
    foreach ($reviews as $review){

        echo '<div class="block">';
        echo '<p  class="p">Автор: ' . $review->author. '</p>';
        echo '<p  class="p">Содержимое: ' . $review->content. '</p>';
        echo '<p  class="p">Рейтинег: ' . $review->rating. '</p>';
        echo '</div>';

    }
    ?>
</div>
