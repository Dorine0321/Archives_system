<!doctype html>
<html class="no-js" lang="en">

@include('admin.layouts.includes.header')
@yield('css')
<link rel="stylesheet" href="../css/c3.min.css">

<body class="materialdesign">
    <div class="wrapper-pro">

        @include('admin.layouts.menu.sidebar')
        @include('admin.layouts.menu.topbar')

       @yield('body')
    </div>

    @yield('js')
    @include('admin.layouts.includes.footer')

    <script src="{{ asset('/js/c3-charts/d3.min.js') }}"></script>
    <script src="{{ asset('/js/c3-charts/c3.min.js') }}"></script>
    <script src="{{ asset('/js/c3-charts/c3-active.js') }}"></script>
</body>

</html>
