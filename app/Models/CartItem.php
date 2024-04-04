<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class CartItem extends Model
{
    use HasFactory;

    public function getSubtotalAttribute() {
        return $this->product->price * $this->quantity;
    }

    public function product(): HasOneThrough
    {
        return $this->hasOneThrough(
            Product::class,
            ProductVariant::class,
            'id',
            'id',
            'product_variant_id',
            'product_id'
        );
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
