<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    public $table = 'product_stocks';
    public $fillable = ['name', 'qty', 'price'];
}
