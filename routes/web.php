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
Route::get('/', 'FrontController@productsList');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('Home');
Route::get('/menu', 'ProductController@productscategory')->name('Menu');

//----------------- Cart -----------------------------

Route::Post('/cart/add', 'CartController@store')->name('cart.store');
Route::get('/cart', 'CartController@index')->name('shopping-cart');
Route::get('/emptycart', function(){
    Cart::destroy();
    return redirect()->route('shopping-cart');
});

Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.delete');
