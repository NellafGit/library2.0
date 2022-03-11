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

Route::group(['middleware' => 'auth', 'namespace' => 'Admin\Author'] , function () {
    Route::get('/admin/authors', 'IndexController' )->name('author.index');
    Route::get('admin/authors/create', 'CreateController')->name('author.create');
    Route::post('admin/authors', 'StoreController')->name('author.store');
    Route::get('admin/authors/{author}/edit', 'EditController')->name('author.edit');
    Route::patch('admin/authors/{author}', 'UpdateController')->name('author.update');
    Route::delete('admin/authors/{author}', 'DestroyController')->name('author.delete');


});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin\Book'] , function () {
    Route::get('admin/books', 'IndexController')->name('book.index');
    Route::get('admin/books/create','CreateController')->name('book.create');
    Route::post('admin/books', 'StoreController')->name('book.store');
    Route::get('admin/books/{book}/edit', 'EditController')->name('book.edit');
    Route::patch('admin/books/{book}', 'UpdateController')->name('book.update');
    Route::delete('admin/books/{book}', 'DestroyController')->name('book.delete');
});


