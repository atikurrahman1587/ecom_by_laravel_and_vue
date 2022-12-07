<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all-category',[
    'uses'      =>'App\Http\Controllers\ApiController@AllCategory',
]);
Route::get('category-for-others',[
    'uses'      =>'App\Http\Controllers\ApiController@CategoryForOthers',
]);
Route::get('all-recent-product',[
    'uses'      =>'App\Http\Controllers\ApiController@allRecentProduct',
]);
Route::get('all-trending-product',[
    'uses'      =>'App\Http\Controllers\ApiController@allTrendingProduct',
]);
Route::get('all-category-product/{id}',[
    'uses'      =>'App\Http\Controllers\ApiController@allCategoryProduct',
]);
Route::get('recent-product-for-category',[
    'uses'      =>'App\Http\Controllers\ApiController@recentProductForCategory',
]);
Route::get('get-product-image-by-id/{id}',[
    'uses'      =>'App\Http\Controllers\ApiController@getProductImageById',
]);
Route::get('get-product-basic-info/{id}',[
    'uses'      =>'App\Http\Controllers\ApiController@getProductBasicInfo',
]);
Route::get('get-product-description/{id}',[
    'uses'      =>'App\Http\Controllers\ApiController@getProductDescription',
]);
