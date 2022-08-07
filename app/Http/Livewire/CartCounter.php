<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCounter extends Component
{
    public $carts;

    protected $listeners = ['counter-update' => 'render'];

    public function render()
    {
        $this->carts = Cart::select('id')->where('userId', Auth::id())->get();

        return view(
            'livewire.cart-counter',
            ['carts' => $this->carts]
        );
    }
}
