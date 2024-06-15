<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>
        @section('name')
            پنل ادمین
        @show
    </title>
    @include('admin.include.head')
</head>

<body class="animsition">
<div class="page-wrapper">
    @include('admin.include.header')
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">
        @section('welcome')
        @include('admin.include.welcome')
        @show
        @yield('content')
    </div>
</div>
@include('admin.include.scripts')
@yield('extra_js')
</body>

</html>
<!-- end document-->
