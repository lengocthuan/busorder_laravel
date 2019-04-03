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
    return view('welcome_content');
});

Route::get('/aboutus', function () {
    return view('termsconditions');
});

// Route::get('/registration', function () {
//     return view('registration');
// });

Route::get('login', function () {
    return view('login');
});

Route::get('registration', function () {
    return view('registration');
});


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

