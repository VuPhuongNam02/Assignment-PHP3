<!-- Sidebar -->
<aside class="wrap-sidebar js-sidebar">
    <div class="s-full js-hide-sidebar"></div>

    <div class="sidebar flex-col-l p-t-22 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
            <ul class="sidebar-link w-full">
                @if(\Illuminate\Support\Facades\Auth::check())

                <li class="p-b-13">
                    <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                        My Wishlist
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="/tai-khoan" class="stext-102 cl2 hov-cl1 trans-04">
                        My Account
                    </a>
                </li>

                <li class="p-b-13">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                </li>
                    <div class="sidebar-gallery w-full">
                        <a href="/dang-xuat" class="mtext-101 cl5">
                            Đăng xuất
                        </a>
                    </div>
                @else

            <div class="sidebar-gallery w-full">
					<a href="/dang-nhap" class="mtext-101 cl5">
					Đăng nhập
					</a>
            </div>
            @endif
        </div>
    </div>
</aside>
