@extends('admin.template')
@section('name')
    @parent
    - شرکت ها
@endsection
@section('content')
    @section('welcome')
    @endsection
{{--    @dd($brands)--}}
    <div class="table-responsive table-responsive-data2">
        <div class="alert" style="direction: rtl">
            <div class="d-flex align-items-center justify-content-between">
                <form  class="au-form-icon--sm">
                    <input  class="au-input--w300 au-input--style2" type="text" placeholder=" جستجو " name="search" value="{{$search}}">
                    <input class="au-input--w300 au-input--style2" type="hidden" name="page" value="{{$brands->currentPage()}}">
                    <button  class="au-btn--submit2" type="submit">
                        <i  class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div>
                    <span>نمایش</span>
                    <span>{{($brands->currentPage()-1) * $brands->perPage() + 1}}</span>
                    <span>تا</span>
                    <span>{{$brands->currentPage() * $brands->perPage()}}</span>
                    <span>از</span>
                    <span>{{$brands->total()}}</span>
                    {{$brands->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
        <x-alert></x-alert>
        <table style="direction: rtl !important;"  class="table table-data2 text-center">
            <thead>
            <tr>
                <th>
                    <label class="au-checkbox mr-5">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </th>
                <th class="text-center">ردیف</th>
                <th class="text-center">عنوان</th>
{{--                <th class="text-center">برند های مرتبط</th>--}}
                <th class="text-center">پیش نمایش تصویر</th>
                <th class="text-center">توضیحات</th>
                <th class="text-center">وضعیت شرکت</th>
                <th class="text-center">رنگ نمادین</th>
{{--                <th class="text-center">قیمت</th>--}}
                <th class="text-center">تاریخ پست</th>
                <th class="text-center">عملیات</th>
            </tr>
            </thead>
            @foreach($brands as $brand)
                <tbody>
                <tr class="tr-shadow">
                    <td class="text-center align-middle">
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td class="text-center align-middle">
                        <p>{{($brands->currentPage()-1) * $brands->perPage() + $loop->iteration}}</p>
                    </td>
                    <td class="text-center align-middle">{{$brand->title}}</td>
                    <td class="text-center align-middle">
                        <img style="width: 150px; height: 80px" src="{{route('showfile',$brand->image)}}" alt="تصویر شرکت">
                    </td>

                    <td class="text-center align-middle">
                        {{$brand->description}}
                    </td>

{{--                    <td class="text-center align-middle">{!! $brand->html_status !!}</td>--}}
                    <td class="text-center align-middle change-item-speciality">{!! $brand->html_special_changable !!}</td>
                    <td class="text-center align-middle" style="background-color: {{$brand->color}}"></td>
                    <td class="text-center align-middle">{{ explode(' ', $brand->post_date)[0] }}</td>
                    <td class="text-center align-middle">
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                            <a class="item" href="{{route('brand.show',$brand->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            {{--                            delete item--}}
                            <button
                                type="button"
                                data-placement="top"
                                class="delete-item item btn btn-secondary mb-1"
                                title="Delete"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                {{--                                data-bs-target="#deleteModal"--}}
                                data-title="{{$brand->title}}"
                                data-id="{{$brand->id}}"
                            >
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            {{--                            delete item--}}
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                </tbody>
                <!-- modal static -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                     data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">حذف محصول</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="direction: rtl">
                                    آیا از حذف شرکت با عنوان
                                    <span id="modal-post-title">
                                    </span>
                                    اطمینان کامل دارید ؟
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">!  خیر   </button>

                                <form action="{{route('brand.destroy',['brand'=>$brand])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="brand_id" id="brand_id" value="">
                                    <button type="submit" class="btn btn-primary"> ! بله حذف کن   </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal static -->
            @endforeach
        </table>
    </div>
    <form>
        <div class="card-body d-flex justify-content-center align-items-center" style="direction: rtl">
            <p>نمایش</p>
            <select name="per_page">
                <option value="5" @if($per_page == 5) selected @endif>5</option>
                <option value="10" @if($per_page == 10) selected @endif>10</option>
                <option value="15" @if($per_page == 15) selected @endif>15</option>
                <option value="20" @if($per_page == 20) selected @endif>20</option>
            </select>
            <p>عدد در هر صفحه</p>
            <button class="btn btn-primary" type="submit">  تایید</button>
        </div>
    </form>
@endsection
@section('extra_js')
    <script>
        $(document).on('click', '.change-item-speciality', function() {
            let id = $(this).data('id');
            let td = $(this).closest('td');
            $.ajax({
                url: "{{ route('change-brand-speciality') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    td.html(data['html']);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".delete-item").click(function () {
                $("#brand_id").val($(this).data('id'));
                $("#modal-post-title").html($(this).data('title'));
            });
        });
    </script>
@endsection
