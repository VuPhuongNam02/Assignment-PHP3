<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartAside extends Component
{
    public $carts;

    protected $listeners = ['counter-update' => 'render'];

    public function render()
    {
        $this->carts = Cart::with('product')->where('userId', Auth::id())
            ->get();

        return view('livewire.cart-aside', [
            'carts' => $this->carts
        ]);
    }
}
