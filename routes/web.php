<?php

use Illuminate\Support\Facades\Route;

Route::resource("products", "ProductsController", ["only" => ["index", "show", "create", "store"]]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post("/rooms", "RoomsController@store");
Route::get("/rooms/{id}", "RoomsController@show");
Route::post("/messages", "MessagesController@store");
