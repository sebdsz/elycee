<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', 'FrontController@index');
Route::get('actualites', 'FrontController@posts');
Route::get('actualite/{post}', 'FrontController@post');
Route::get('lycee', 'FrontController@school');
Route::get('mentions-legale', 'FrontController@legal');
Route::get('contact', 'FrontController@contact');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.teacher']], function () {
    Route::get('/', 'BackController@index');
    Route::resource('fiches', 'QcmController');
    Route::resource('articles', 'PostController');
    Route::resource('eleves', 'StudentController');
});


