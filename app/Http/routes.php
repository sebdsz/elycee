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
Route::pattern('id', '[0-9]+');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('password/reset', 'Auth\PasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('', 'FrontController@index');
Route::get('actualites', 'FrontController@posts');
Route::get('actualite/{post}', 'FrontController@post');
Route::get('lycee', 'FrontController@school');
Route::get('mentions-legale', 'FrontController@legal');
Route::get('contact', 'FrontController@contact');
Route::get('recherche', 'FrontController@search');

Route::group(['prefix' => 'admin', 'middleware' => 'auth.teacher'], function () {
    Route::get('', 'BackController@index');
    Route::resource('fiches', 'RecordController');
    Route::post('fiches/action', 'RecordController@action');
    Route::resource('articles', 'PostController');
    Route::post('articles/action', 'PostController@action');
    Route::resource('eleves', 'StudentController');
    Route::post('eleves/action', 'StudentController@action');
    Route::get('questions/{id}/edit', 'ChoiceController@edit');
    Route::put('questions/{id}/edit', 'ChoiceController@update');
});


Route::group(['prefix' => 'etudiant', 'middleware' => 'auth'], function () {
    Route::get('', 'QCMController@dashboard');
    Route::get('liste', 'QCMController@index');
    Route::get('fiche/{id}', 'QCMController@question');
    Route::post('comment', 'CommentController@store');
    Route::post('fiche/{id}/check', 'QCMController@check');
    Route::delete('comment/delete/{id}', 'CommentController@delete');
    Route::put('comment/update/{id}', 'CommentController@update');
});



