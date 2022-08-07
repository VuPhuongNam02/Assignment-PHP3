<div>
    <form wire:submit.prevent="submit">
        <div class="p-t-15">
            <div class="flex-w p-b-10">
                <div class="size-203">
                    Size
                </div>

                <div class="size-204 respon6-next">
                    <select class="form-control" name="size" wire:model="size">
                        <option value="0" hidden selected>Chọn size</option>
                        {{ \App\Helpers\Helper::loadSize($productId, false, 0, true) }}
                    </select>

                    @error('size')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex-w p-b-10">
                <p class="size-203">
                    Số lượng
                </p>
                <p>
                    <input type="number" name="quantity" wire:model="quantity" value="1"
                        style="border: 1px solid rgba(0,0,0,0.3); width: 90px;text-align:center; border-radius: 6px; padding: 5px" />

                    @error('quantity')
                    <p class="error">{{ $message }}</p>
                @enderror
                </p>
            </div>
            <button type="submit"
                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                Thêm vào giỏ
            </button>
        </div>
    </form>
</div>
