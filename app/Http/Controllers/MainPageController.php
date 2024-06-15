<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
//        $brand = Brand::find(1);
//        dd($brand->products); // اطمینان حاصل از رابطه
        $specialBrands = Brand::where('is_special','special')->get();
        $normalBrands = Brand::all();
        $normalProducts = Product::descPub()->paginate();
        $specialProducts = Product::descOnly()->where('is_special', 'special')->get();

        $data = [
            'normalBrands' => $normalBrands,
            'normalProducts' => $normalProducts,
            'specialBrands' => $specialBrands,
            'specialProducts' => $specialProducts,
        ];

        return view('pages.main_page', $data);
    }


    public function products()
    {
        $specialBrands = Brand::where('is_special','special')->get();
        $normalBrands = Brand::all();
        $normalProducts = Product::descPub()->paginate();
        $specialProducts = Product::where('is_special', 'special')->get();

        $data = [
            'normalBrands' => $normalBrands,
            'normalProducts' => $normalProducts,
            'specialBrands' => $specialBrands,
            'specialProducts' => $specialProducts,
        ];
        return view('pages.products',$data);
    }

    public function product_view(Product $product)
    {
        $specialBrands = Brand::where('is_special','special')->get();
        $specialProducts = Product::where('is_special', 'special')->get();
        $data=[
            'specialProducts' => $specialProducts,
            'specialBrands' => $specialBrands,
        ];
//        dd($product);
        return view('pages.product_view',['product' => $product],$data);
    }

    public function brand_view(brand $brand)
    {
        $products=$brand->products;
        $specialBrands = Brand::where('is_special','special')->get();
        $specialProducts = Product::where('is_special', 'special')->get();
        $data=[
            'specialProducts' => $specialProducts,
            'specialBrands' => $specialBrands,
            'products'=>$products
        ];
//        dd($brand);
        return view('pages.brand_view',['brand' => $brand],$data);
    }

}
