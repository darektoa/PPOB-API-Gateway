<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategorySetting extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];


    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_categoty_id');
    }


    public function provider() {
        return $this->belongsTo(ProductProvider::class, 'product_provider_id');
    }
}
