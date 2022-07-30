<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head')
</head>

<body>

    @include('include.nav')

    @include('include.aside')

    @include('include.cart')

    @yield('content')


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    @include('include.foot')
</body>

</html>
