<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Money\Currency;
use Money\Money;

class Cart extends Model
{
    use HasFactory;


    public function getTotalAttribute() {
        return $this->items->sum('subtotal');
    }

    public function items() {
        return $this->hasMany(CartItem::class);
    }
}
