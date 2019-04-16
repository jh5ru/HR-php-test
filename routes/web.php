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


Route::get('/','HomeController@index')->name('home');

Route::get('/weather','WeatherController@index')->name('weather');

Route::get('/weather/refresh','WeatherController@refresh')->name('weather.refresh');

Route::get('/order','OrderController@index')->name('order');

Route::get('/order/edit/{id}','OrderController@edit')->name('order.edit');

Route::post('/order/save/{id}','OrderController@save')->name('order.save');

Route::get('/product/{order?}','ProductController@index')->name('product');

Route::post('/product/save/{id}','ProductController@save')->name('product.save');
