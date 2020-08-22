<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {

    // Route::get('/marketplace', 'MarketplaceController@index')->name('home');
    Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile.show');
    Route::get('/profile/{user:username}/edit', 'ProfileController@edit')->middleware('can:edit,user')->name('profile.edit');
    Route::post('/profile/{user:username}/delete', 'ProfileController@destroy')->middleware('can:edit,user')->name('profile.delete');
    Route::post('/profile/{user:username}', 'ProfileController@update')->middleware('can:edit,user')->name('profile.update');

    Route::get('/product/{manufacturer}/create', 'ProductController@create')->middleware('can:create_product,manufacturer')->name('product.create');
    Route::post('/product/{manufacturer}/create', 'ProductController@store')->middleware('can:create_product,manufacturer')->name('product.store');
    Route::get('/product/{product}/show', 'ProductController@show')->name('product.show');
    Route::get('/product/{product}/edit', 'ProductController@edit')->middleware('can:edit_product,product')->name('product.edit');
    Route::post('/product/{product}/update', 'ProductController@update')->middleware('can:edit_product,product')->name('product.update');
    Route::post('/product/{product}/delete', 'ProductController@destroy')->middleware('can:edit_product,product')->name('product.delete');

    Route::get('/Supply/{supply}', 'SupplyController@show')->name('supply.show');
    Route::post('/Supply/{supply}', 'SupplyController@destroy')->name('supply.delete');
    Route::get('/Supply/{seller}/create', 'SupplyController@create')->middleware('can:create_supply,seller')->name('supply.create');
    Route::post('/Supply/{seller}/create', 'SupplyController@store')->middleware('can:create_supply,seller')->name('supply.store');

    Route::post('/Supply/{user:username}/{supply}/cart', 'ProfileController@addToOrRemoveCart')->name('addOrRemoveCart');

    Route::post('/product/{supply}/review', 'ReviewController@store')->name('supply.review');
    Route::post('/product/{supply}/review/update', 'ReviewController@update')->name('supply.review.update');
    Route::post('/product/{supply}/pay', 'SupplyController@pay')->name('payment');
});

Route::get('/marketplace', 'MarketplaceController@index')->name('home');
Route::get('/search', 'MarketplaceController@search')->name('search');

Auth::routes();
