<?php

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
Route::get('loginout','Home\LoginController@loginout');

Route::group([
    'prefix' => '',
    'namespace' => 'Front'
], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('shop', 'ShopController@index')->name('shop');
    Route::get('shop/products', 'ShopController@index')->name('shop-products');
    Route::get('shop/item', 'ShopController@detail')->name('shop-item');
});

// 不使用name 模板要使用url
Route::group(['prefix'=>'home','namespace'=>'Home'], function () {
    Route::any('login','LoginController@login');
    Route::get('register','LoginController@register');
    Route::post('register/store','LoginController@store');

//用户中心
    Route::resource('user', 'UserController');
    // Route::post('user/update','UserController@update1');

});
