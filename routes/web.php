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

Route::get('/', function () {
    return view('welcome');
});

Route::get('blogs', 'BlogsController@index');
Route::get('blogs/create','BlogsController@create');
Route::get('blogs/show/{id}','BlogsController@show');
Route::get('blogs/category/{category}', 'BlogsController@category');
Route::post('blogs/show/{id}','BlogsController@edit');
Route::post('blogs','BlogsController@store');
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');
