<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => 'App\Http\Controllers\MyauthController@index',
    'as' => '/login',
    'middleware' => ['guest:' . config('fortify.guard')],
]);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('dashboard', [
        'uses' => 'App\Http\Controllers\DashbordController@index',
        'as' => 'dashboard',
    ]);

    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::get('catetgory/update-category-status/{id}', [
        'uses' => 'App\Http\Controllers\CategoryController@updateCategoryStatus',
        'as' => 'updateCategoryStatus',
    ]);
    Route::get('sub-category-by-category-id', [
        'uses' => 'App\Http\Controllers\CategoryController@subCategoryByCategory',
        'as' => 'sub-category-by-category-id',
    ]);

    Route::resource('/subCategory', App\Http\Controllers\SubCategoryController::class);
    Route::get('catetgory/update-subCategory-status/{id}', [
        'uses' => 'App\Http\Controllers\SubCategoryController@updatesubCategoryStatus',
        'as' => 'updateSubCategoryStatus',
    ]);

    Route::resource('/brand', App\Http\Controllers\brandController::class);
    Route::get('brand/update-brand-status/{id}', [
        'uses' => 'App\Http\Controllers\brandController@updateBrandStatus',
        'as' => 'updateBrandStatus',
    ]);

    Route::resource('/color', App\Http\Controllers\colorController::class);
    Route::get('color/update-color-status/{id}', [
        'uses' => 'App\Http\Controllers\colorController@updateColorStatus',
        'as' => 'updateColorStatus',
    ]);

    Route::resource('/size', App\Http\Controllers\sizeController::class);
    Route::get('size/update-size-status/{id}', [
        'uses' => 'App\Http\Controllers\sizeController@updateSizeStatus',
        'as' => 'updateSizeStatus',
    ]);
    Route::resource('/unit', App\Http\Controllers\unitController::class);
    Route::get('unit/update-unit-status/{id}', [
        'uses' => 'App\Http\Controllers\unitController@updateUnitStatus',
        'as' => 'updateUnitStatus',
    ]);

    Route::get('product/product-add-page', [
        'uses' => 'App\Http\Controllers\ProductController@productAddPage',
        'as' => 'productAddPage',
    ]);
    Route::post('product/product-save', [
        'uses' => 'App\Http\Controllers\ProductController@productSave',
        'as' => 'productSave',
    ]);
    Route::get('product/manageProduct', [
        'uses' => 'App\Http\Controllers\ProductController@manageProduct',
        'as' => 'manageProduct',
    ]);

    Route::resource('/supplier', App\Http\Controllers\SuplierController::class);
    Route::get('supplier/update-supplier-status/{id}', [
        'uses' => 'App\Http\Controllers\SuplierController@updateSupplierStatus',
        'as' => 'updateSupplierStatus',
    ]);

//---------------stock Route here---------------------// 
    Route::get('stock/stock-add-page', [
        'uses' => 'App\Http\Controllers\StockController@index',
        'as' => 'stockAddPage',
    ]);
    Route::get('all-data-for-stock-form', [
        'uses' => 'App\Http\Controllers\StockController@allDataForStockForm',
        'as' => 'all-data-for-stock-form',
    ]);
    Route::get('product-info-for-stock', [
        'uses' => 'App\Http\Controllers\StockController@productDataForStock',
        'as' =>   'product-info-for-stock',
    ]);
    Route::post('productStockAdd', [
        'uses' => 'App\Http\Controllers\StockController@productStockAdd',
        'as' =>   'productStockAdd',
    ]);
//---------------stock Route here---------------------//
}); //RouteGroup

 