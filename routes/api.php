<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts', 'PagesController@home');
Route::get('blog/{post}', 'PostController@show');
Route::get('categorias/{category}', 'CategoryController@show');
Route::get('etiquetas/{tag}', 'TagController@show');
Route::get('archivo', 'PagesController@archive');

Route::post('messages', 'ContactController@send');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
