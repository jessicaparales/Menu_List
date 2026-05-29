<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    protected $fillable = [
        'menu_name',
        'menu_price',
        'menu_picture',
        'menu_category',
    ];
}
