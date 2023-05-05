<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class  Menu extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nameIng',
        'description',
        'ves',
        'typeDishId',
        'price',
        'photo'
    ];

    protected $table = 'menu';
}

//1)Добавление в меню
//2)Изменение меню
//3)Удаление из меню
//4)Поиск
//5)Регистрация
//6)Авторизация
//7)Добавление картинки
//8)Фильтрация