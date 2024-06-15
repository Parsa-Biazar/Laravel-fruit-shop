@extends('admin.template')
@section('name')
    @parent
    - ویرایش محصول {{$header_title}}
@endsection
@section('content')
    @section('welcome')
    @endsection
    <x-alert></x-alert>

    <div class="col-lg-12" style="direction: rtl">
        <div class="card">
            <div class="card-header">
                <strong>{{$page_title}} = {{$header_title}}</strong>
            </div>
            <div class="card-body d-flex justify-content-center">
                <figure>
                    <img src="{{route('showfile',$product->image)}}" alt="پیش نمایش تصویر">
                </figure>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('product.update',['product'=>$product->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class="form-control-label">عنوان</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="عنوان محصول" class="form-control" value="@if(old('title')){{old('title')}}@else {{$product->title}}@endif">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class="form-control-label">توضیحات</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="6" placeholder="توضیحات محصول" class="form-control">@if(old('description')){{old('description')}}@else{{$product->description}}@endif</textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date" class="form-control-label">تاریخ پست</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="date" name="date" class="form-control" value="{{ explode(' ', $product->post_date)[0] }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class="form-control-label">وضعیت نمایش</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option selected disabled><-- انتخاب کنید --></option>
                                <option value="published" {{ $product->status == 'published' ? 'selected' : '' }}>فعال</option>
                                <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>غیرفعال</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="special" class="form-control-label">وضعیت محصول</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="special" id="special" class="form-control">
                                <option selected disabled><-- انتخاب کنید --></option>
                                <option value="normal" {{ $product->is_special == 'normal' ? 'selected' : '' }}>عادی</option>
                                <option value="special" {{ $product->is_special == 'special' ? 'selected' : '' }}>ویژه</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="price" class="form-control-label">قیمت محصول</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="price" placeholder="قیمت محصول" name="price" class="form-control" value="{{str_replace('$','',$product->price)}}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="image" class="form-control-label">تصویر محصول</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="brands" class="form-control-label">برند‌های مرتبط</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select type="text" name="brands[]" class="form-control select2" multiple id="brands">
                                @foreach($brands as $brand)
                                    <option class="w-100" value="{{ $brand->id }}" {{ $product->brands->contains('id', $brand->id) ? 'selected' : '' }}>{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-envelope"></i> ارسال
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-eraser"></i> بازنشانی
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script>
        $(document).ready(function (){
            $('.select2').select2();
        });
    </script>
@endsection
