<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsMedia extends Model {

    protected $fillable = ['product_id', 'gallery'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}