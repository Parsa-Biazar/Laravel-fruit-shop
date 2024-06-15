@extends('template')
@section('name')
@parent
    اصلی
@endsection
@section('content')
<section class="secound-box">
    <h2 class="secound-box-title">
        مجموعه اجناس جدید
    </h2>
    <p class="secound-box-p">
        شرکای مربوطه ی سایت
    </p>
    <div class="d-flex justify-content-center">
        <ul class="secound-box-list">
            @foreach($normalBrands as $brand)
                <li class="secound-box-item text-center badge">
                    <a class="secound-box-a" href="{{ route('brand_view',['brand'=>$brand] )}}">{{$brand->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="d-flex justify-content-center text-center align-items-center">
        {{$normalProducts->links("pagination::bootstrap-4")}}
    </div>

            <div class="secound-box-all-products">

                @foreach($normalProducts as $product)
                    <section class="secound-box-products">
                        <div class="brand-buttons">
                            @foreach($product->brands as $brand)
                                <a href="{{ route('brand_view', ['brand' => $brand]) }}" style="background-color: {{$brand->color}};color: white" class="brand-button text-center">{{$brand->title}}</a>
                            @endforeach
                        </div>
                        <figure class="secound-box-pro-fig">
                            <img class="secound-box-pro-img" src="{{route('showfile',$product->image)}}" alt="pro 1">
                        </figure>
                        <div class="behind-info">
                            <h1 class="behind-info-h1"> {{$product->title}} </h1>
                            <p class="behind-info-p">{{$product->description}}</p>
                        </div>
                        <div class="sec-info">
                            <h6 class="secound-box-pro-h4">
                                {{$product->date_diff}}
                            </h6>
                            <p class="secound-box-pro-p">
                                {{$product->id}}
                            </p>
                            <p class="secound-box-pro-price">
                                {{$product->price}}
                            </p>
                            <a href="{{ route('product_view', ['product' => $product]) }}" class="cat-btn">
                                اطلاعات بیشتر !
                            </a>
                        </div>
                    </section>
                @endforeach
            </div>
        </section>
@endsection
@section('special')
    <section class="fourth-box-sec-sec">
        @foreach($specialProducts as $special)
            <div class="fourth-box-div">
                <figure class="fourth-box-products">
                    <img class="perfumes-img" src="{{route('showfile',$special->image)}}" alt="perfumes1">
                </figure>
                <div class="info">
                    <p class="info-p">
                        {{$special->title}}
                    </p>
                    <div class="">
                        @foreach($special->brands as $brand)
                            <a href="{{route('brand_view',['brand'=>$brand])}}" style="background-color: {{$brand->color}};color: white" class="brand-button">{{$brand->title}}</a>
{{--                            <h6 class="secound-box-pro-h4">--}}
{{--                                {{$special->date_diff}}--}}
{{--                            </h6>--}}
                        @endforeach
                    </div>
                    <a href="{{ route('product_view', ['product' => $special]) }}" class="info-btn">
                        اطلاعات بیشتر
                    </a>
                </div>
            </div>
        @endforeach
    </section>
@endsection
@section('brands')
    <div class="top-title-box">
        <h3 class="top-title-h3">
            برند های برتر سایت !
        </h3>
        <p class="top-title-p">
            از بهترین برند های سایت ما دیدن کنید !
        </p>
    </div>

    <div STYLE="display: flex; justify-content: center; justify-content: space-around">
        @foreach($specialBrands as $special)
            <div class="first-box-item">
                <section class="product-section">
                    <a href="{{route('brand_view',['brand'=>$special])}}">
                        <figure class="product-fig">
                            <img src="{{route('showfile',$special->image)}}" alt="pro-1" class="product-img">
                        </figure>
                    </a>
                    <h4 class="product-title">
                        {{$special->title}}
                    </h4>
                    <span class="product-svg">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns:serif="http://www.serif.com/" width="100%" height="100%" viewBox="0 0 881 130"
                         version="1.1" xml:space="preserve"
                         style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                        <g transform="matrix(1,0,0,1,-634.728,-382.568)">
                            <path
                                d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z"
                                style="fill:rgb(255,216,0);" />
                        </g>
                        <g transform="matrix(1,0,0,1,-447.914,-382.568)">
                            <path
                                d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z"
                                style="fill:rgb(255,216,0);" />
                        </g>
                        <g transform="matrix(1,0,0,1,-261.961,-382.568)">
                            <path
                                d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z"
                                style="fill:rgb(255,216,0);" />
                        </g>
                        <g transform="matrix(1,0,0,1,-76.0238,-382.568)">
                            <path
                                d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z"
                                style="fill:rgb(255,216,0);" />
                        </g>
                        <g transform="matrix(1,0,0,1,109.853,-382.568)">
                            <path
                                d="M702.68,382.568L718.721,431.938L770.632,431.938L728.635,462.45L744.677,511.82L702.68,481.308L660.683,511.82L676.724,462.45L634.728,431.938L686.639,431.938L702.68,382.568Z"
                                style="fill:rgb(255,216,0);" />
                        </g>
                    </svg>
                </span>
                    <p class="product-info">
                        {{$special->description}}
                    </p>
                </section>
            </div>
        @endforeach
    </div>
@endsection
