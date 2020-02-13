<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/new-offer','NewofferController@index');
Route::post('/new-offer','NewofferController@store')->name('offerstore');


Route::get('/new-candidature','NewcandidatureController@index');
Route::post('/new-candidature','NewcandidatureController@store')->name('candidaturestore');




Route::get('/new-offer', function () {
    return view('new-offer');
});




Route::get('/index', function () {
    return view('index');
});


Route::get('/alloffers', function () {
    $result=  DB::table('offers')->select('*')->paginate(12);

    return view('alloffers', [
        'offer' => $result
 
     ]);
});


Route::get('/single-offer', function () {
    return view('single-offer');
});

Route::get('/single-user', function () {
    return view('single-user');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', function () {
    return view('blog');
});



Route::get('/new-candidature', function () {
    return view('new-candidature');
});

Route::get('/job-post', function () {
    return view('job-post');
});




Route::get('/search-offers', 'SearchController@searchoffers')->name('search-offers');

Route::get('/search-users', 'SearchController@searchusers')->name('search-users');

Route::get('/{offer}','Offer@showweb')->name('offer.show');
Route::get('/index','Offer@indexweb')->name('offer.index');

Route::get('/search-offers-results', function () {
    return view('search-offers-results');
});

Route::get('/search-users-results', function () {
    return view('search-users-results');
});



