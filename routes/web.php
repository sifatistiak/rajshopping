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
    return view('frontend.index');
});

Route::get('/products', function () {
    return view('frontend.products');
});

Route::get('/a', function () {
    return view('admin.index');
});

Route::get('/form', function () {
    return view('admin.form');
});
