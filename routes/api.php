<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::get('/users', 'User@index');
Route::get('/user/{id}', 'User@show');
Route::post('/user', 'User@create');
Route::delete('/user/{id}', 'User@destroy');
Route::put('/user/{id}', 'User@edit');
Route::patch('/user/{id}', 'User@update');

Route::get('/offers', 'Offerta@index');
Route::get('/offer/{id}', 'Offerta@show');
Route::post('/offer', 'Offerta@create');
Route::delete('/offer/{id}', 'Offerta@destroy');
Route::put('/offer/{id}', 'Offerta@edit');
Route::patch('/offer/{id}', 'Offerta@update');


Route::get('/candidatures', 'Candidatura@index');
Route::get('/candidature/{id}', 'Candidatura@show');
Route::post('/candidature', 'Candidatura@create');
Route::delete('/candidature/{id}', 'Candidatura@destroy');


Route::get('/groups', 'Gruppo@index');
Route::get('/group/{id}', 'Gruppo@show');
Route::post('/group', 'Gruppo@create');
Route::delete('/group/{id}', 'Gruppo@destroy');
Route::put('/group/{id}', 'Gruppo@edit');
Route::patch('/group/{id}', 'Gruppo@update');


Route::get('/notifications', 'Notifica@index');
Route::get('/notification/{id}', 'Notifica@show');
Route::post('/notification', 'Notifica@create');
Route::delete('/notification/{id}', 'Notifica@destroy');


Route::get('/requirements', 'Requisito@index');
Route::post('/requirement', 'Requisito@create');
Route::delete('/requirement/{id}', 'Requisito@destroy');
Route::put('/requirement/{id}', 'Requisito@edit');
Route::patch('/requirement/{id}', 'Requisito@update');


Route::get('/preferences', 'Preferenza@index');
Route::post('/preference', 'Preferenza@create');
Route::delete('/preference/{id}', 'Preferenza@destroy');
Route::put('/preference/{id}', 'Preferenza@edit');


