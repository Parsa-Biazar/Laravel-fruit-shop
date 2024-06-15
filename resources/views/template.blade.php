<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('name')
        پارسا -@show
    </title>
    @include('include.head')
</head>

<body>
<section id="head-sec">
    @include('include.header')
</section>
<!-- top title inside div -->
<section class="first-box">
    <section class="first-box-content">
        {{--فیلد برند اینجاست--}}

        @section('top-brands')
            @yield('brands')
        @show

        {{--        @include('include.hero')--}}

{{--فیلد کانتنت و محصولات اینجاست--}}
        @yield('content')
        @include('include.cat')
    </section>
{{--    @include('include.features')--}}
    <!-- third box -->
    <section class="third-box">
        <h1 class="fourth-box-title">محصول ویژه سایت</h1>
    </section>
    <section class="fourth-box-sec">
        @yield('special')
    </section>

</section>
@include('include.footer')
</body>
</html>
