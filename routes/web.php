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
//my Home
// Route::get('/', function () {
//     return view('welcome_content');
// });
//show list router bus which active;

Route::get('/', 'RouterDropdownListController@index');

//my
Route::get('/aboutus', function () {
    return view('termsconditions');
});

// Route::get('/registration', function () {
//     return view('registration');
// });

// Route::get('/login', function () {
//     return view('login');
// });

//create/add a user in database (include validation data)
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('registration', function () {
    return view('registration');
});

Route::get('unique/{email}', 'RegistrationController@unique');

Route::get('/login', 'LoginController@create');

Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@destroy');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('check', 'RouterDropdownListController@test');
//Update private information;
Route::get('/updateinfo/{id}', 'UserController@index'); //show ra profile
Route::post('/edited/{id}', 'UserController@update'); //update

//seat reservation
Route::get('seatbooking', 'UserController@seatReservation');
Route::get('timemoving', 'UserController@timeMoving');
Route::get('/noti', function () {
    return view('notification');
});


// Admin Route
Route::get('/admin/login', 'AdminController@adloginform'); //get
Route::get('admin/logout', 'AdminController@destroy'); //logout
Route::post('/admin/login', 'AdminController@adminlogin');

Route::group(['middleware' => 'login'], function () {
	//login admin
    Route::get('admin/dashboard/', 'AdminController@index');
     //post

    // Route::get('admin/dashboard', 'AdminController@index'); //dashboard

    Route::get('admin/routerlist', 'BusController@index'); //route bus list
    Route::delete('admin/deletebus/{id}', 'BusController@deleteBus'); //delete route;
    Route::post('admin/updatebus/{id}', 'BusController@showUpdate'); //show update route;
    Route::post('admin/updateroutebus/{id}', 'BusController@update'); //update bus route;

    Route::get('admin/locslist', 'BusController@showLocation'); //route bus list
    Route::get('admin/locslist2/{id}', 'BusController@showDetailLocation'); //route bus list $key
    Route::delete('admin/deletelocs/{id}', 'BusController@deleteLocation'); //delete locations;

    Route::get('admin/addrouterbus', 'BusController@create'); //create route bus list
    Route::post('admin/addbus', 'BusController@store'); //create route bus list

    // Route::get('/admin/header', function () {
    //     return view('users/admins/admin_header');
    // });
});

// Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function(){
//     //action table users

//     Route::group(['prefix' => 'busroute'], function() {
//         Route::get('dashboard', 'AdminController@index');
//     });
// });

// Route::get('/adminnguyen', function () {
//     return view('front_header');
// });
