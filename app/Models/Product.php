<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'td_products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'td_product_categories', 'product_id', 'category_id');
    }
}
