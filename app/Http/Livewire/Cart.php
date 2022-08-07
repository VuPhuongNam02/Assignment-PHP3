<?php

namespace App\Http\Livewire;

use App\Http\Services\CartService;
use App\Models\Cart as ModelsCart;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{

    public $product, $productId, $quantity, $size;

    protected $rules = [
        'size' => 'required',
        'quantity' => 'required'
    ];

    protected $messages = [
        'size.required' => 'Hãy chọn size !',
        'quantity.required' => 'Hãy nhập số lượng !',
    ];

    public function resetField()
    {
        $this->size = '';
        $this->quantity = '';
    }

    public function mount($product, $productId)
    {
        $this->product = $product;
        $this->productId = $productId;
    }

    public function submit()
    {
        if (Auth::check()) {
            $validate = $this->validate();
            ModelsCart::create([
                'size' => $validate['size'],
                'quantity' => $validate['quantity'],
                'userId' => Auth::id(),
                'productId' => $this->product->id,
            ]);
            $this->resetField();
            $this->emit('counter-update');
        } else {
            return redirect('/dang-nhap?callback_url=/san-pham/' . $this->product->slug);
        }
    }

    public function render()
    {
        return view(
            'livewire.cart',
            [
                'product' => $this->product,
                'productId' => $this->productId
            ]
        );
    }
}
