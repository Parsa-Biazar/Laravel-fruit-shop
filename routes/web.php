<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\MainPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::group(['prefix'=>''],function (){
    route::get('',[MainPageController::class,'index'])->name('main');
    route::get('/products',[MainPageController::class,'products'])->name('products');
    route::get('product/{product}',[MainPageController::class,'product_view'])->name('product_view');
    route::get('brand/{brand}',[MainPageController::class,'brand_view'])->name('brand_view');
});
route::group(['prefix'=>'admin/','middleware'=>'auth'],function (){
    route::get('',[AdminMainController::class,'index'])->name('dashboard');
    Route::resource('product',ProductController::class);
    Route::resource('brand',BrandController::class);
});
Route::post('change_post_status',[ProductController::class,'changeStatus'])->name('change-post-status');
Route::post('change_post_speciality', [ProductController::class, 'changeSpeciality'])->name('change-post-speciality');
Route::post('change_brand_speciality', [BrandController::class, 'changeSpeciality'])->name('change-brand-speciality');
route::get('show_file/{filename}',function ($filename){
    return response()->file(storage::path("public\\".$filename));
})->name('showfile');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
