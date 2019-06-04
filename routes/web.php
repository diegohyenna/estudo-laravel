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

Route::group(['namespace' => 'Site'], function(){
    Route::get('/', 'SiteController@index');
});

Route::group(['namespace' => 'Produto'], function(){
    Route::resource('/produtos', 'ProdutoController');
    // Route::get('/produtos', 'ProdutoController@index');  
    // Route::post('/produtos/store', 'ProdutoController@store');    
});
