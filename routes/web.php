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

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');//роут на главную
Route::group([
    'middleware' => 'auth'],
    function () {
        Route::post('/add__product', 'ProductController@addProduct')->name('add_product');//добавление товара
        Route::get('/product/{id}', 'ProductController@edit')->where(['id' => '[0-9]+'])->name('edit');//редактирование своего товара
        Route::post('/update/{id}', 'ProductController@update')->where(['id' => '[0-9]+'])->name('update');
        Route::get('/product/{aliase}', 'ProductController@showOne')->name('showOne');//показать один товар
        Route::post('/buy_product', 'OrderController@buyProduct');//купить товар
        Route::get('/my/buy_product','SiteController@myBuy')->name('myBuy');//показать приобретенные товары


    });
