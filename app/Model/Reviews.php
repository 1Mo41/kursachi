<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class  Reviews extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'author',
        'content',
        'rating'
    ];

    protected $table = 'reviews';
}
