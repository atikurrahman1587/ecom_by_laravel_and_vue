<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses'      =>'App\Http\Controllers\LoginController@index',
    'as'        =>'/'
]);

Route::get('/dashboard', [
    'uses'      =>'App\Http\Controllers\DashboardController@index',
    'as'        =>'dashboard',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::resource('/category', \App\Http\Controllers\CategoryController::class);
Route::get('/update-category-status/{id}', [
    'uses'      =>'App\Http\Controllers\CategoryController@updateStatus',
    'as'        =>'category.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::resource('/sub-category', \App\Http\Controllers\SubCategoryController::class);
Route::get('/update-sub-category-status/{id}', [
    'uses'      =>'App\Http\Controllers\SubCategoryController@updateStatus',
    'as'        =>'sub-category.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);


Route::resource('/brand', \App\Http\Controllers\BrandController::class);
Route::get('/update-brand-status/{id}', [
    'uses'      =>'App\Http\Controllers\BrandController@updateStatus',
    'as'        =>'brand.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::resource('/color', \App\Http\Controllers\ColorController::class);
Route::get('/update-color-status/{id}', [
    'uses'      =>'App\Http\Controllers\ColorController@updateStatus',
    'as'        =>'color.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::resource('/size', \App\Http\Controllers\SizeController::class);
Route::get('/update-size-status/{id}', [
    'uses'      =>'App\Http\Controllers\SizeController@updateStatus',
    'as'        =>'size.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);


Route::resource('/unit', \App\Http\Controllers\UnitController::class);
Route::get('/update-unit-status/{id}', [
    'uses'      =>'App\Http\Controllers\UnitController@updateStatus',
    'as'        =>'unit.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/add-new-product', [
    'uses'      =>'App\Http\Controllers\ProductController@index',
    'as'        =>'product.add',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::get('/get-all-color-and-size', [
    'uses'      =>'App\Http\Controllers\ProductController@getAllColorSize',
    'as'        =>'get-all-color-and-size',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::get('/get-sub-category-by-category', [
    'uses'      =>'App\Http\Controllers\ProductController@getSubCategoryBycategory',
    'as'        =>'get-sub-category-by-category',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::post('/new-product', [
    'uses'      =>'App\Http\Controllers\ProductController@create',
    'as'        =>'product.store',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/manage-product', [
    'uses'      =>'App\Http\Controllers\ProductController@manage',
    'as'        =>'product.manage',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/update-product-status/{id}', [
    'uses'      =>'App\Http\Controllers\ProductController@updateStatus',
    'as'        =>'product.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::get('/product-detail/{id}', [
    'uses'      =>'App\Http\Controllers\ProductController@detail',
    'as'        =>'product.detail',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/product-edit/{id}', [
    'uses'      =>'App\Http\Controllers\ProductController@edit',
    'as'        =>'product.edit',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/product-update/{id}', [
    'uses'      =>'App\Http\Controllers\ProductController@update',
    'as'        =>'product.update',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/product-delete/{id}', [
    'uses'      =>'App\Http\Controllers\ProductController@delete',
    'as'        =>'product.delete',
    'middleware'=>['auth:sanctum', 'verified']
]);


/*==================Supplier==================*/

Route::get('/add-new-supplier', [
    'uses'      =>'App\Http\Controllers\SupplierController@index',
    'as'        =>'supplier.add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::post('/new-supplier', [
    'uses'      =>'App\Http\Controllers\SupplierController@create',
    'as'        =>'supplier.store',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/update-supplier-status/{id}', [
    'uses'      =>'App\Http\Controllers\SupplierController@updateStatus',
    'as'        =>'supplier.update-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::get('/supplier-detail/{id}', [
    'uses'      =>'App\Http\Controllers\SupplierController@detail',
    'as'        =>'supplier.detail',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/supplier-edit/{id}', [
    'uses'      =>'App\Http\Controllers\SupplierController@edit',
    'as'        =>'supplier.edit',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/supplier-update/{id}', [
    'uses'      =>'App\Http\Controllers\SupplierController@update',
    'as'        =>'supplier.update',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/supplier-delete/{id}', [
    'uses'      =>'App\Http\Controllers\SupplierController@delete',
    'as'        =>'supplier.delete',
    'middleware'=>['auth:sanctum', 'verified']
]);
/*==================Supplier==================*/

/*==================Stock==================*/

Route::get('/add-new-stock', [
    'uses'      =>'App\Http\Controllers\StockController@index',
    'as'        =>'stock.add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/get-all-data-for-stock', [
    'uses'      =>'App\Http\Controllers\StockController@getAllData',
    'as'        =>'get-all-data-for-stock',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::get('/get-product-data-for-stock', [
    'uses'      =>'App\Http\Controllers\StockController@getProductData',
    'as'        =>'get-product-data-for-stock',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::post('/new-stock', [
    'uses'      =>'App\Http\Controllers\StockController@create',
    'as'        =>'stock.store',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/manage-stock', [
    'uses'      =>'App\Http\Controllers\StockController@manage',
    'as'        =>'stock.manage',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/stock-detail/{id}', [
    'uses'      =>'App\Http\Controllers\StockController@detail',
    'as'        =>'stock.detail',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::get('/stock-edit/{id}', [
    'uses'      =>'App\Http\Controllers\StockController@edit',
    'as'        =>'stock.edit',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/stock-update/{id}', [
    'uses'      =>'App\Http\Controllers\StockController@update',
    'as'        =>'stock.update',
    'middleware'=>['auth:sanctum', 'verified']
]);
Route::post('/stock-delete/{id}', [
    'uses'      =>'App\Http\Controllers\StockController@delete',
    'as'        =>'stock.delete',
    'middleware'=>['auth:sanctum', 'verified']
]);
/*==================Stock==================*/


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
