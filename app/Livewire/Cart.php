<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;


class Cart extends Component
{ 

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return CartFactory::make()->items;
    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->find($itemId) ?->increment('quantity');
        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = CartFactory::make()->items()->find($itemId);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }
        $this->dispatch('productRemoveFromCart');
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();
        $this->dispatch('productRemoveFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}

