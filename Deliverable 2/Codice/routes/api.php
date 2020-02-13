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




Route::get('/users', 'User@index');
Route::get('/users/{id}', 'User@show');
Route::post('/users', 'User@store');
Route::delete('/users/{id}', 'User@destroy');
Route::put('/users/{id}', 'User@edit');
Route::patch('/users/{id}', 'User@update');
Route::get('/login', 'User@login');

Route::get('/offers', 'Offer@index');
Route::get('/offers/{id}', 'Offer@show');
Route::post('/offers', 'Offer@store');
Route::delete('/offers/{id}', 'Offer@destroy');
Route::put('/offers/{id}', 'Offer@edit');
Route::patch('/offers/{id}', 'Offer@update');


Route::get('/candidatures', 'Candidature@index');
Route::get('/candidatures/{id}', 'Candidature@show');
Route::post('/candidatures', 'Candidature@store');
Route::delete('/candidatures/{id}', 'Candidature@destroy');


Route::get('/groups', 'Group@index');
Route::get('/groups/{id}', 'Group@show');
Route::post('/groups', 'Group@store');
Route::delete('/groups/{id}', 'Group@destroy');
Route::put('/groups/{id}', 'Group@edit');
Route::patch('/groups/{id}', 'Group@update');


Route::get('/notifications', 'Notification@index');
Route::get('/notifications/{id}', 'Notification@show');
Route::post('/notifications', 'Notification@store');
Route::delete('/notifications/{id}', 'Notification@destroy');


Route::get('/requirements/{id}', 'Requirement@show');
Route::post('/requirements', 'Requirement@store');
Route::delete('/requirements/{id}', 'Requirement@destroy');
Route::put('/requirements/{id}', 'Requirement@edit');
Route::patch('/requirements/{id}', 'Requirement@update');


Route::get('/preferences/{email}', 'Preference@index');
Route::post('/preferences', 'Preference@store');
Route::delete('/preferences/{id}', 'Preference@destroy');
Route::put('/preferences/{id}', 'Preference@edit');

