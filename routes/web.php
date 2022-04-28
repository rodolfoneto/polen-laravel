<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->group(function() {

    /**
     * Products Routes
     */
    Route::get('products/show/{sku}', 'ProductController@show')->name('products.show');
    Route::get('products/search', 'ProductController@search')->name('products.search');
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create');
    Route::get('products/{sku}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('products/{sku}', 'ProductController@update')->name('products.update');
    Route::post('products', 'ProductController@store')->name('products.store');
    Route::delete('products/{id}', 'ProductController@delete')->name('products.delete');

    /**
     * Permissions Routes
     */
    Route::get('permissions/create', 'ACL\PermissionController@create')->name('permissions.create');
    Route::get('permissions/{id}/show', 'ACL\PermissionController@show')->name('permissions.show');
    Route::get('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::get('permissions', 'ACL\PermissionController@index')->name('permissions.index');
    Route::get('permissions/{id}/edit', 'ACL\PermissionController@edit')->name('permissions.edit');
    Route::put('permissions/{id}', 'ACL\PermissionController@update')->name('permissions.update');
    Route::post('permissions', 'ACL\PermissionController@store')->name('permissions.store');
    Route::delete('permissions/{id}', 'ACL\PermissionController@destroy')->name('permissions.delete');

    /**
     * Profile
     */
    Route::get('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');


    Route::any('/', function(){
        dd('RAIZ');
    });
});

Route::get('/', function () {
    return view('welcome');
});
