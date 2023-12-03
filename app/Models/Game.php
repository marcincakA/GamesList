<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publisher',
        'developer',
        'category1',
        'category2',
        'category3',
        'popis', //preco zrazu slovensky ani boh nevie, asi dajaky brainfart
        'image',
    ];
}
