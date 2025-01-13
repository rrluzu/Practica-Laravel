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
    Route::get('products', function () {
        $products = Product::orderBy('price', 'asc')->get();
        return view('products.index', compact('products'));
    })->name('products.index');
    
    Route::get('products/create', function(){
        return view('products.create');
    })->name('products.create');
    
    Route::post('products', function(Request $request){
        return $request->all();
    })->name('products.store');
    
    Route::post('products', function(Request $request){
        $newProduct = new Product;
        $newProduct -> description = $request -> input('description');
        $newProduct -> price = $request -> input('price');
        $newProduct -> save();
        return redirect()->route('products.index')->with('info', 'Producto insertado correctamente');
    })->name('products.store');
    
    Route::delete('products/{id}', function($id){
        $product = Product::findOrFail($id);
        $product -> delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado correctamente');
    })->name('products.destroy');
    
    Route::get('products/{id}/edit', function($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');
    
    Route::put('products/{id}', function(Request $request, $id){
        $product = Product::findOrFail($id);
        $product -> description = $request ->input(('description'));
        $product -> price = $request ->input('price');
        $product -> save();
        return redirect()->route('products.index')->with('info', 'Producto modificado correctamente');
    })->name('products.update');
});

Auth::routes();
