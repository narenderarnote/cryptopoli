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
    return view('welcome');
})->name('home');
Route::get('/thank-you', function(){
	return view('thanks');
})->name('thanks');
Route::group([ 'prefix' => 'auth', "as" => "auth." , "namespace" => "Auth"],function()
{
	Route::post('/', [ 'as' => 'login', "uses" => "LoginController@login"] );
	Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
	Route::get('/confirmation/{token}', [ 'as' => "confirm", "uses"=> "RegisterController@confirmation"]);

	Route::group([ 'prefix' => "password", 'as' => 'password.' ], function()
	{

		Route::match(['get','post'], '/forgot', [ 'as' => 'forgot', 'uses' => "ForgotPasswordController@forgot"]);
		Route::match(['get','post'], '/reset/{token}', [ 'as' => 'reset', "uses" => "ResetPasswordController@reset"]);

	});
	
	Route::get('/admin', [ 'as' => 'admin', "uses" => "LoginController@login", "status" => "admin" ] );
	Route::get('/customer', [ 'as' => 'customer', "uses" => "LoginController@login", "status" => "customer" ] );

});

Route::group(["namespace" => "Dashboard" , "middleware" => ["auth", "role:|admin|customer"]], function()
{
	Route::get('/dashboard', [ "as" =>"dashboard", 'uses' => "DashboardController@index" ]);
	Route::get('/portfolio', [ 'as' => "portfolio", "uses"=> "DashboardController@portfolio"]);
	Route::get('/order/{currency}/{type}', [ 'as' => "order", "uses"=> "DashboardController@order"]);
});

Route::group([ 'prefix' => 'auth', "as" => "auth." , "namespace" => "Auth"], function()
{
	Route::match(['GET', "POST"], '/register', [ 'as' => 'register', "uses" => "CustomerSignupController@signup" ] );
});