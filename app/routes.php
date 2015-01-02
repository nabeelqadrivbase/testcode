<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@showHome', 'as' => 'home'));


/*User Related Routes*/
Route::get('/user/register', array('uses' => 'UserController@getUserRegister', 'as' => 'register'));
Route::get('/user/login', array('uses' => 'UserController@getUserLogin', 'as' => 'login'));


/*Gruop of Route for Guest to Post Data*/
Route::group(array('before' => 'guest'),function(){
	
	Route::group(array('before' => 'csrf'),function(){
	
		Route::post('/user/register',array('uses' => 'UserController@SaveRegister' , 'as' =>'SaveRegister' ));
		
		/*Login*/
		Route::post('/user/login',array('uses' => 'UserController@UserLogin' , 'as' =>'UserLogin' ));
		
	
	});
	
});


Route::group(array('before' => 'auth'), function()
{
 Route::get('/user/logout', array('uses' => 'UserController@UserLogout', 'as' => 'getlogout')); 
});