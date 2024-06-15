<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandAddRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \request()->search;

        $per_page = \request()->per_page??15;
        $brands = Brand::descOnly()
            ->when($search,function ($query) use ($search) {
                $query->whereRaw("title like '%$search%' or description like '%$search%'  ");
            })
            ->paginate($per_page);

        $data=[
            'brands' => $brands,
            'per_page' => $per_page,
            'search' => $search,
        ];

        return view('admin.pages.brands.brands',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'page_title'=>'افزودن شرکت جدید',
        ];
        return view('admin.pages.brands.add_brand',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandAddRequest $request)
    {
        $brand= new brand();
        $brand->title = $request->title;
        $brand->description = $request->description;
        $brand->post_date = $request->date;
        $brand->color = $request->color;
        $brand->is_special = $request->special;
        $file = $request->file('image');
        $n = $file->store('public');
        $filename = str_replace('public/','',$n);
        $brand->image = $filename;

        $brand->save();

        $data=[
            'status'=>'success',
            'message'=>'.شرکت با موفقیت افزوده شد '
        ];

        return redirect()->route('brand.index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand=Brand::find($id);
        $data=[
            'header_title'=>$brand->title,
            'page_title'=>'ویرایش شرکت',
            'brand'=>$brand,
        ];
        return view('admin.pages.brands.edit_brand',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request , $id)
    {
        //        dd($request->all());
        $brand=Brand::find($id);
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $n = $file->store('public');
            $file_Name = str_replace('public/','',$n);
            $brand -> image = $file_Name;
        }
        $brand->title = $request->title;
        $brand->description = $request->description;
        $brand->post_date = $request->date;
        $brand->color = $request->color;
        $brand->is_special = $request->special;

        $brand->save();
        $data=[
            'status'=>'success',
            'message'=>'.شرکت با موفقیت ویرایش گردید '
        ];

        return redirect()->route('brand.index')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rules = ['brand_id' => 'required'];
        Validator(request()->all(), $rules)->validate();
        // Delete pivot
        ProductBrand::where('brand_id', request()->brand_id)->delete();
        // Delete the brand
        Brand::findOrFail(request()->brand_id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'شرکت موردنظر با موفقیت حذف شد.'
        ];

        return redirect()->back()->with($data);
    }
    public function changeSpeciality()
    {
        $brand = Brand::find(\request()->id);
        if ($brand->is_special == 'normal') {
            $brand->is_special = 'special';
            $html = "<span class='badge p-3 text-white bg-primary change-item-speciality' data-id='{$brand->id}'>شرکت ویژه</span>";
        } else {
            $brand->is_special = 'normal';
            $html = "<span class='badge p-3 text-white bg-warning change-item-speciality' data-id='{$brand->id}'>شرکت عادی</span>";
        }
        $brand->save();

        $data = [
            'html' =>  $html
        ];
        return response()->json($data);
    }
}
