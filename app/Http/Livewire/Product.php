<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use App\Models\ProductSize;
use Livewire\Component;

class Product extends Component
{
    public
        $sizes,
        $products,
        $categoryId,
        $sizeId;

    public array $filters = [];


    protected $queryString = [
        'sizeId' => ['except', '', 'as' => 'size'],
        'categoryId' => ['except', '', 'as' => 'category']
    ];

    public function mount($sizes, $products)
    {
        $this->sizes = $sizes;
        $this->products = $products;
    }

    public function render()
    {
        $this->products = ModelsProduct::select('id', 'name', 'price', 'sale', 'image')
            ->when($this->categoryId, function ($query) {
                $query->where('categoryId', $this->categoryId);
            })
            ->when($this->sizeId, function ($query) {
                $proSize = ProductSize::where('sizeId', $this->sizeId)->get();
                $ids = $proSize->pluck('productId');
                $query->whereIn('id', $ids);
            })
            ->get();

        return view(
            'livewire.product',
            [
                'products' => $this->products,
                'sizes' => $this->sizes,
                'filters' => $this->filters
            ]
        );
    }

    public function clearFilter($type)
    {
        $this->filters[$type] = [];
    }
}
