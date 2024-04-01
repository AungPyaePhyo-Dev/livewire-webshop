<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;

    public $product;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount() {
        $this->variant = $this->productDetail->variants()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart) {
        $this->validate();
        $cart->add(
             $this->variant
        );

        $this->banner('Your product has been added to your cart');
        $this->dispatch('productAddedToCart');
    }

    public function getProductDetailProperty() {
        return \App\Models\Product::findOrFail($this->product);
    }


    public function render()
    {
        return view('livewire.product');
    }


}
