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

Route::get('all-category', [
        'uses' => 'App\Http\Controllers\ApiController@allCategory',
        'as' => 'all-category',
    ]);
Route::get('all-recent-product', [
        'uses' => 'App\Http\Controllers\ApiController@allRecentProduct',
        'as' => 'all-recent-product',
    ]);
Route::get('all-tranding-product', [
        'uses' => 'App\Http\Controllers\ApiController@allTrendingProduct',
        'as' => 'all-tranding-product',
    ]); 
Route::get('product-by-category/{id}', [
        'uses' => 'App\Http\Controllers\ApiController@productByCategory',
        'as' => 'product-by-category',
    ]);
Route::get('get-product-images-for-details-page/{id}', [
        'uses' => 'App\Http\Controllers\ApiController@productImageForDetailsPage',
        'as' => 'get-product-images-for-details-page',
    ]);
Route::get('get-product-basic-info-for-details-page/{id}', [
        'uses' => 'App\Http\Controllers\ApiController@productBasicInfoForDetailsPage',
        'as' => 'get-product-basic-info-for-details-page',
    ]); 
Route::get('get-product-description/{id}', [
        'uses' => 'App\Http\Controllers\ApiController@getProductDescription',
        'as' => 'get-product-description',
    ]);