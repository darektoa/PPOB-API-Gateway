<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProduct extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];


    public function product() {
        return $this->belongsTo(Product::class);
    }

    
    public function provider() {
        return $this->belongsTo(ProductProvider::class, 'product_provider_id');
    }


    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
