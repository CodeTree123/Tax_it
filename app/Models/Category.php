<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function childP()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
