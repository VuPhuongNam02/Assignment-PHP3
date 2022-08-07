<div class="header-cart-content flex-w js-pscroll">
    @if (\Illuminate\Support\Facades\Auth::check())
        <ul class="header-cart-wrapitem w-full">
            @php
                $total = 0;
            @endphp
            @forelse($carts as $key => $cart)
                <li class="header-cart-item flex-w flex-t m-b-2">
                    <div class="header-cart-item-img">
                        <img src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="#" class="flex-w w-full header-cart-item-name m-b-2 trans-04"
                            style="display: flex; gap: 1rem">
                            <h6> {{ $cart->product->name }}</h3>
                                <h6> x {{ $cart->quantity }}</h6>
                        </a>

                        <a class="header-cart-item-name m-b-2 hov-cl1 trans-04">
                            Size: {{ $cart->size }}
                        </a>

                        <span class="header-cart-item-info">
                            {{ \App\Helpers\Helper::price($cart->product->price, $cart->product->sale, 'VNĐ') }}
                        </span>
                    </div>
                </li>
                @php
                    $total += $cart->quantity * $cart->product->price;
                @endphp
            @empty
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <span class="header-cart-item-info mtext">
                        Giỏ hàng trống
                    </span>
                </li>
            @endforelse
        </ul>

        <div class="w-full">
            <div class="header-cart-total w-full p-tb-40">
                Total: {{ \App\Helpers\Helper::price($total, 0, ' VNĐ') }}
            </div>



            <div class="header-cart-buttons flex-w w-full">
                <a href="/gio-hang"
                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                    Xem giỏ
                </a>

                <a href="shoping-cart.html"
                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                    Thanh toán
                </a>
            </div>
        </div>
    @endif
</div>
