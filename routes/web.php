<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/products/show/{sku}', 'App\Http\Controllers\Admin\ProductController@show')->name('products.show');
Route::get('admin/products/search', 'App\Http\Controllers\Admin\ProductController@search')->name('products.search');
Route::get('admin/products', 'App\Http\Controllers\Admin\ProductController@index')->name('products.index');
Route::get('admin/products/create', 'App\Http\Controllers\Admin\ProductController@create')->name('products.create');
Route::get('admin/products/{sku}/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
Route::put('admin/products/{sku}', 'App\Http\Controllers\Admin\ProductController@update')->name('products.update');
Route::post('admin/products', 'App\Http\Controllers\Admin\ProductController@store')->name('products.store');
Route::delete('admin/products/{id}', 'App\Http\Controllers\Admin\ProductController@delete')->name('products.delete');

Route::get('/', function () {
    return view('welcome');
});
