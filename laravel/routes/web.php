<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

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

Route::middleware('auth')->group(function(){

    Route::get('products', 'ProductController@index'
    )->name('products.index');
    
    Route::get('products/create', 'ProductController@create'
    )->name('products.create');
    
    Route::post('products', 'ProductController@store'
    )->name('products.store');
    
    Route::delete('products/{id}', 'ProductController@destroy'
    )->name('products.destroy');
    
    Route::get('products/{id}/edit', 'ProductController@edit'
    )->name('products.edit');
    
    Route::put('products/{id}', 'ProductController@update'
    )->name('products.update');
});

Auth::routes();
