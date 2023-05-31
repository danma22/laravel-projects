<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'short_desc',
        'long_desc',
        'sales_price',
        'purchase_price',
        'stock',
        'weight',
    ];
}
