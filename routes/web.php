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

Route::get('/', 'BookController@index')->name('inicio');

Route::prefix('books')->group(function () {
    Route::post('/lists', 'BookController@searchBooks')->name('buscarLivros');
    Route::get('/show/ISBN={ISBN}', 'BookController@getBook')->name('exibirLivro');
    Route::get('/list-by-author/{id}', 'BookController@getBooksByAuthor')->name('buscarLivrosPorAuthor');
    Route::get('/list-by-category/{id}/{name}', 'BookController@getBooksByCategory')->name('buscarLivrosPorCategoria');
});

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('carrinho');
    Route::get('/add/{ISBN}', 'CartController@add')->name('carrinhoAdicionar');
    Route::get('/delete/{ISBN}', 'CartController@delete')->name('carrinhoRemover');
    Route::get('/checkout', 'CartController@checkout')->name('procederCompra');
    Route::post('/accountCheckout', 'CartController@accountCheckout')->name('informarDados');
    Route::post('/finalize', 'CartController@finalize')->name('finalizarCompra');
});

Route::view('sobre', 'about')->name('sobre');
Route::get('conta', 'AccountController@index')->name('conta');
