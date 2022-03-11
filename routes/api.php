<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller('Api\v1\AuthorController')->middleware('auth:sanctum')->group(function() {
    Route::get('v1/authors/list', 'list');
    Route::get('v1/authors/{id}', 'by_id');
    Route::put('v1/authors/update/{id}', 'update');
    Route::delete('v1/authors/{id}', 'delete');
});

Route::controller('Api\v1\BookController')->middleware('auth:sanctum')->group(function() {
    Route::get('v1/books/list', 'list');
    Route::get('v1/books/{id}', 'by_id');
    Route::put('v1/books/update/{id}', 'update');
    Route::delete('v1/books/{id}', 'delete');
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('token', 'LoginController');
});
