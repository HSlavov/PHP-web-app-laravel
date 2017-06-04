<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'main_image', 'old_price', 'new_price'];

    public function productsMedia()
    {
        return $this->hasMany(ProductsMedia::class);
    }
}


