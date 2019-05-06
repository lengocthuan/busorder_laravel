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

//create/add a user in database (include validation data)
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('registration', function () {
    return view('registration');
});

//notification as pop up when they input a field has exists;
Route::get('unique/{email}', 'RegistrationController@unique');
Route::get('unique1/{username}', 'RegistrationController@unique1');

Route::get('/login', 'LoginController@create');

Route::post('/login', 'LoginController@login');



// Route::get('/registration', function () {
//     return view('registration');
// });

// Route::get('/login', function () {
//     return view('login');
// });
//Customer middleware

Route::group(['middleware' => 'customer'], function () {

    // Auth::routes();
Route::get('/logout', 'LoginController@destroy');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('check', 'RouterDropdownListController@test');
//Update private information;
Route::get('/updateinfo/{id}', 'UserController@index'); //show ra profile
Route::post('/edited/{id}', 'UserController@update'); //update

//seat reservation
Route::get('seatbooking', 'UserController@seatReservation');
Route::get('timemoving', 'UserController@timeMoving');

Route::post('customer/booking/{id}', 'UserController@detailBooking'); //show infor booking;

Route::get('customer/abcbooking/{id}', 'UserController@updateBooking'); //update infor booking;
// Route::post('customer/booking/{id}', 'UserController@detailBooking');
Route::delete('customer/deletebooking/{id}', 'UserController@destroyBooking');

Route::get('location', 'UserController@showLocation');

Route::get('/noti', function () {
    return view('notification');
});

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
    Route::get('admin/routerlist/{id}', 'BusController@show'); //show detail a record at another table has reference to BusInformation;
    Route::delete('admin/deletebus/{id}', 'BusController@deleteBus'); //delete route;
    Route::post('admin/updatebus/{id}', 'BusController@showUpdate'); //show update route;
    Route::post('admin/updateroutebus/{id}', 'BusController@update'); //update bus route;
    Route::get('admin/addrouterbus', 'BusController@create'); //create route bus list
    Route::post('admin/addbus', 'BusController@store'); //create route bus list


    //for bus information
    Route::get('admin/businfo', 'BusInforController@index'); //show index
    Route::get('admin/businfo/{id}', 'BusInforController@show'); //show a record
    Route::get('admin/addbusinfo', 'BusInforController@create'); //show view add
    Route::post('admin/addbusinfo', 'BusInforController@store'); //add
    Route::get('admin/updatebusinfo/{id}', 'BusInforController@edit'); //show view update
    Route::post('admin/updatebusinfo/{id}', 'BusInforController@update'); //update
    Route::delete('admin/deletebusinfo/{id}', 'BusInforController@destroy'); //delete

    //for User Manager
    Route::get('admin/manageuser', 'AdminUserController@index');
    Route::get('admin/manageuser/{id}', 'AdminUserController@show');
    Route::get('admin/addmanageuser', 'AdminUserController@create');
    Route::post('admin/addmanageuser', 'AdminUserController@store');
    Route::get('admin/manageuserdetail/{id}', 'AdminUserController@edit');
    Route::post('admin/manageuserdetail/{id}', 'AdminUserController@update');
    Route::delete('admin/deletemanageuser/{id}', 'AdminUserController@destroy');

    //for Ticket Manger
    Route::get('admin/ticket', 'AdminTicketController@index');
    Route::get('admin/ticket/{id}', 'AdminTicketController@show');
    Route::get('admin/addticket', 'AdminTicketController@create');
    Route::post('admin/addticket', 'AdminTicketController@store');
    Route::get('admin/ticketdetail/{id}', 'AdminTicketController@edit');
    Route::post('admin/ticketdetail/{id}', 'AdminTicketController@update');
    Route::delete('admin/deleteticket/{id}', 'AdminTicketController@destroy');

    //for Location Manager
    Route::get('admin/locslist', 'BusController@showLocation'); //route bus list
    Route::get('admin/locslist2/{id}', 'BusController@showDetailLocation'); //route bus list $key
    Route::delete('admin/deletelocs/{id}', 'BusController@deleteLocation'); //delete locations;
    Route::get('admin/addlocations', 'LocationController@create'); //add locations;
    Route::post('admin/addlocations', 'LocationController@store'); //add locations;
    Route::get('admin/locationdetail/{id}', 'LocationController@edit');
    Route::post('admin/locationdetail/{id}', 'LocationController@update');

    //for Order Manager
    Route::get('admin/order', 'AdminOrderController@index');
    Route::get('admin/order/{id}', 'AdminOrderController@show');
    Route::get('admin/addorder', 'AdminOrderController@create');
    Route::post('admin/addorder', 'AdminOrderController@store');
    Route::get('admin/orderdetail/{id}', 'AdminOrderController@edit');
    Route::post('admin/orderdetail/{id}', 'AdminOrderController@update');
    Route::delete('admin/deleteorder/{id}', 'AdminOrderController@destroy');

    //for Detail Order Manager

    //for Image Manager
    Route::get('admin/imagebus', 'AdminImageController@index');

    //for Review Manager

    //for Social Account Manager

    //for Role Manager

    //for User Role Manager

    //for notification
    Route::get('admin/noti', function () {
        return view('users/admins/adminnoti');
    });

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

// Route::get('/seat', function () {
//     return view('seat123');
// });