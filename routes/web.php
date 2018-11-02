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

Route::get('/', function () {
    return view('pages.home');
});

// signup routes
Route::get('/signup/artist', 'Auth\SignupController@artist')->name('signup.artist');
Route::post('/signup/artist', 'Auth\SignupController@post')->name('post.signup.artist');

Route::get('/signup/manager', 'Auth\SignupController@manager')->name('signup.manager');
Route::post('/signup/manager', 'Auth\SignupController@post')->name('post.signip.manager');

Route::get('/signup/coordinator', 'Auth\SignupController@coordinator')->name('signup. coordinator');
Route::post('/signup/coordinator', 'Auth\SignupController@post')->name('post.signip.coordinator');

// end of signup

// verify user route
Route::get('/verify/{code}', 'Auth\SignupController@verify')->middleware('verify')->name('signup.verify');
// verify request to manger user
Route::get('/verify/artist/{code}', 'Auth\SignupController@verify')->middleware('verifyManager')->name('signup.manager.verify');

// ajax routes
Route::get('/ajax/artist-suggest', 'Ajax\AutocompleteController@suggest')->name('ajax.autocomplete');