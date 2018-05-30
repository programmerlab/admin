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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, auth-token');
header('Access-Control-Allow-Credentials: true');


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

Route::get('/', function(){
	return \Redirect::to('admin');
});
 
/*
|--------------------------------------------------------------------------
| Auth Routes for social login
|--------------------------------------------------------------------------
*/
Route::any('auth/{provider}', 'AuthController@redirectToProvider');
Route::any('{provider}/callback', 'AuthController@handleProviderCallback');
Route::any('google', 'AuthController@handleProviderCallback');
Route::get('account/login', function(){
	return \Redirect::to('admin');
});
