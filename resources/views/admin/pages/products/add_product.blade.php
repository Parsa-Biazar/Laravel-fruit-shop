@extends('admin.template')
@section('name')
    @parent
    - افزودن محصول
@endsection
@section('content')
    @section('welcome')
    @endsection
    <x-alert></x-alert>
    <div class="col-lg-12" style="direction: rtl">
        <div class="card">
            <div class="card-header">
                <strong>{{$page_title}}</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class="form-control-label">عنوان</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="عنوان محصول" class="form-control" value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class="form-control-label">توضیحات</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="6" placeholder="توضیحات محصول" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date" class="form-control-label">تاریخ پست</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class="form-control-label">وضعیت نمایش</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option selected disabled><-- انتخاب کنید --></option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>فعال</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>غیرفعال</option>
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
                                <option value="normal" {{ old('special') == 'normal' ? 'selected' : '' }}>عادی</option>
                                <option value="special" {{ old('special') == 'special' ? 'selected' : '' }}>ویژه</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="price" class="form-control-label">قیمت محصول</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="price" placeholder="قیمت محصول" name="price" class="form-control" value="{{ old('price') }}">
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
                                    <option class="w-100" value="{{ $brand->id }}" {{ in_array($brand->id, old('brands', [])) ? 'selected' : '' }}>{{ $brand->title }}</option>
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
