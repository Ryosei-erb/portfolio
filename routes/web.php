<?php

use Illuminate\Support\Facades\Route;

Route::resource("products", "ProductsController", ["only" => ["index", "show", "create", "store"]]);
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
