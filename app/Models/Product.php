<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categoryID',
        'description',
        'photo1',
        'photo2'
    ];

    protected $table = 'Product';
}
