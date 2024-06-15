<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Product::descOnly()
            ->when($search,function ($query) use ($search) {
                $query->whereRaw("title like '%$search%' or description like '%$search%'  ");
            })
            ->paginate($per_page);

//        $products=Product::descOnly()->get();
        $data=[
            'products' => $products,
            'per_page' => $per_page,
            'search' => $search,
        ];
        return view('admin.pages.products.products',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'page_title'=>'افزودن محصول جدید',
            'brands'=>Brand::all(),
        ];
        return view('admin.pages.products.add_product',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
//        dd($request);
        $product= new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->post_date = $request->date;
        $product->status = $request->status;
        $product->is_special = $request->special;
        $product->price = $request->price.'$';
        $file = $request->file('image');
        $n = $file->store('public');
        $filename = str_replace('public/','',$n);
        $product->image = $filename;

        $product->save();
        foreach ($request->brands as $brand){
            $product_brands=new ProductBrand();
            $product_brands -> product_id = $product->id;
            $product_brands -> Brand_id = $brand;
            $product_brands->save();
        }

        $data=[
          'status'=>'success',
          'message'=>'.محصول با موفقیت افزوده شد '
        ];

        return redirect()->route('product.index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
//        dd($product);
        $data=[
            'header_title'=>$product->title,
            'page_title'=>'ویرایش محصول',
            'brands'=>Brand::all(),
            'product'=>$product,
        ];
//        dd($product);
        return view('admin.pages.products.edit_product',$data);
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
    public function update(ProductUpdateRequest $request , $id)
    {
        //        dd($request->all());
        $product=Product::find($id);
//            dd($product->brands);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $n = $file->store('public');
            $file_Name = str_replace('public/','',$n);
            $product -> image = $file_Name;
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->post_date = $request->date;
        $product->status = $request->status;
        $product->is_special = $request->special;
        $product->price = $request->price.'$';

        $productBrand = ProductBrand::where('product_id',$product->id);
        $productBrand -> delete();
        foreach ($request->brands as $brand) {
            $productBrand = new ProductBrand();
            $productBrand->product_id = $product->id;
            $productBrand->Brand_id = $brand;
            $productBrand->save();
        }

        $product->save();
        $data=[
            'status'=>'success',
            'message'=>'.محصول با موفقیت ویرایش گردید '
        ];

        return redirect()->route('product.index')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
//        dd(\request());
//        dd(\request('post_id'));
        $rules = ['post_id'=>'required'];
        Validator(request()->all(),$rules)->validate();
        // delete pivot
        ProductBrand::where('product_id',request()->post_id)->delete();
        //delete product post
        Product::find(request()->post_id)->delete();
        $data = [
            'status' => 'success',
            'message' => '.محصول موردنظر با موفقیت حذف شد '
        ];
        return redirect()->back()->with($data);
    }
    public function changeStatus()
    {
        $product = Product::find(\request()->id);
        if ($product->status == 'draft'){
            $product->status = 'published';
            $html = "<span class='badge p-3 text-white bg-primary change-item-status' data-id='$product->id'>فعال</span>";
        } else {
            $product->status = 'draft';
            $html = "<span class='badge p-3 text-white bg-warning change-item-status' data-id='$product->id'>غیر فعال</span>";
        }
        $product->save();

        $data = [
            'html' =>  $html
        ];
        return response()->json($data);
    }
    public function changeSpeciality()
    {
        $product = Product::find(\request()->id);
        if ($product->is_special == 'normal') {
            $product->is_special = 'special';
            $html = "<span class='badge p-3 text-white bg-primary change-item-speciality' data-id='{$product->id}'>محصول ویژه</span>";
        } else {
            $product->is_special = 'normal';
            $html = "<span class='badge p-3 text-white bg-warning change-item-speciality' data-id='{$product->id}'>محصول عادی</span>";
        }
        $product->save();

        $data = [
            'html' =>  $html
        ];
        return response()->json($data);
    }

}
