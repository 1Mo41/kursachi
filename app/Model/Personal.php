<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Personal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'firstName',
        'positionID',
        'tableID',
        'photoNaPass',
    ];
    protected $table = 'personal';

}