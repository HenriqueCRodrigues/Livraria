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

Route::get('/', 'BookController@index');
Route::post('/list-books', 'BookController@searchBooks')->name('buscarLivros');
Route::get('/show-book/ISBN={ISBN}', 'BookController@getBook')->name('exibirLivro');
