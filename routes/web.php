<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','LibraryController@index')->name('library.index');

Auth::routes();

Route::group(['middleware' => 'auth'] , function () {
    Route::get('/admin/authors', 'Admin\AuthorController@index' )->name('author.index');
    Route::get('admin/authors/create', 'Admin\AuthorController@create')->name('author.create');
    Route::post('admin/authors', 'Admin\AuthorController@store')->name('author.store');
    Route::get('admin/authors/{author}', 'Admin\AuthorController@show')->name('author.show');
    Route::get('admin/authors/{author}/edit', 'Admin\AuthorController@edit')->name('author.edit');
    Route::patch('admin/authors/{author}', 'Admin\AuthorController@update')->name('author.update');
    Route::delete('admin/authors/{author}', 'Admin\AuthorController@destroy')->name('author.delete');

    Route::get('admin/books', 'Admin\BookController@index')->name('book.index');
    Route::get('admin/books/create','Admin\BookController@create')->name('book.create');
    Route::post('admin/books', 'Admin\BookController@store')->name('book.store');
    Route::get('admin/books/{book}', 'Admin\BookController@show')->name('book.show');
    Route::get('admin/books/{book}/edit', 'Admin\BookController@edit')->name('book.edit');
    Route::patch('admin/books/{book}', 'Admin\BookController@update')->name('book.update');
    Route::delete('admin/books/{book}', 'Admin\BookController@destroy')->name('book.delete');
});
