<div class="zaprosik">
    <h2 class="centr">Поиск в меню</h2>


    <form method="post" action="/kursachi/search" class="discipline">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label> Блюдо<br><input type="text" name="search1" required=""  ></label>

        <button class="but" >Выбрать</button>
    </form>
</div>