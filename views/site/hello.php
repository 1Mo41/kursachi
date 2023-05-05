<div class="zaprosik">
    <h2 class="centr">Поиск сотрудников</h2>


    <form method="post" action="/kursachi/search" class="discipline">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <select  name="search1" >
            <option >Горячее</option>
            <option >Напитки</option>
            <option >Десерты</option>
        </select>

        <button>Выбрать</button>
    </form>
</div>