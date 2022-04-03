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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User management Routes
Route::get("/users", "UserController@index");
Route::get("/users/create", "UserController@create");
Route::post("/users", "UserController@store");
Route::get("/users/{user}", "UserController@show");
Route::post("/users/{user}", "UserController@update");
Route::get("/users/{user}/edit", "UserController@edit");
Route::delete("/users/{user}/delete", "UserController@destroy");

// Media Feed routes
Route::get("/posts", "PostController@index");
Route::get("/posts/create", "PostController@create");
Route::post("/posts", "PostController@store");
Route::get("/posts/{post}", "PostController@show");
Route::post("/posts/{post}", "PostController@update");
Route::get("/posts/{post}/edit", "PostController@edit");
Route::delete("/posts/{post}/delete", "PostController@destroy");

// Theme routes
Route::get("/themes", "ThemeController@index");
Route::get("/themes/create", "ThemeController@create");
Route::post("/themes", "ThemeController@store");
Route::get("/themes/{theme}", "ThemeController@show");
Route::post("/themes/{theme}", "ThemeController@update");
Route::get("/themes/{theme}/edit", "ThemeController@edit");
Route::delete("/themes/{theme}/delete", "ThemeController@destroy");
Route::post("/themes/set/{theme}", "ThemeController@set");
