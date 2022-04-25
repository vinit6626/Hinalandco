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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/login_all','Auth\LoginController@adminLogin');




Route::get('/loginuser','HomeController@login_form');
Route::post('/loginme','HomeController@checklogin');


Route::group(['middleware' => ['auth']], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userprofile','HomeController@getprofile');
Route::get('logout','HomeController@logout');

Route::redirect('/userprofile', '/dash');


//admin path
Route::get('/id','DashboardController@id');
Route::resource('/dash','DashboardController');
Route::resource('/hadmin','AdminController');
Route::post('/hadmin/status','AdminController@status');

Route::resource('/operator','OperatorController');
Route::post('/operator/status','OperatorController@status');

Route::resource('/equipment','EquipmentController');
Route::post('/equipment/status','EquipmentController@status');

Route::resource('/portfolio','PortfolioController');

Route::resource('/inquiry','InquiryController');
Route::post('/inquiry/status','InquiryController@status');


Route::resource('/email','EmailController');
Route::post('/email/status','EmailController@status');

Route::resource('/site','SiteController');
Route::post('/site/status','SiteController@status');

Route::resource('/logsheet','LogsheetController');
Route::post('/logsheet/status','LogsheetController@status');
Route::post('logsheet/sub','LogsheetController@sub');
Route::post('logsheet/date','LogsheetController@date');
Route::post('/logsheet/model','LogsheetController@model');

});





//operator
Route::get('/dashboard/operator_logsheet','DashboardController@show');
// why it's not work

Route::resource('/ologsheet','OperatorlogsheetController');
Route::any('/ty','OperatorlogsheetController@ty');
Route::any('/add','OperatorlogsheetController@create');
Route::post('/ologsheet/status','OperatorlogsheetController@status');

// });

//client
Route::resource('/','HomeclientController');
Route::resource('/home','HomeclientController');
Route::resource('/cprofile','ProfileController');
Route::any('/cequipment','EquipmentclientController@status');
Route::post('/getintouch','EmailController@store');
Route::resource('/about','AboutController');
Route::resource('/contact','ContactController');




//login page
// Route::view('/hnclogin','login.login');

