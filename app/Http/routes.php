<?php

/**
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(array('middleware' => 'web'), function(){

	Route::get('Log-in', 							'Auth\AuthController@getLogin');

	Route::post('Log-in', 							['as' =>'login', 'uses' => 'UsersController@login']);

	Route::get('Log-out', 							'UsersController@getLogout');

	Route::get('/Verify-User/{user_email}', 		['uses' => 'UsersController@verify']);

	Route::get('/Set-User-Password/{user_email}', 	['uses' => 'UsersController@SetNewPassword']);

	Route::post('/Update-User-Password', 			['uses' => 'UsersController@SetPassword']);

	Route::get('/Reset-User-Password', 				['uses' => 'UsersController@ResetUserPassword']);

	Route::post('/Reset-User-Password', 			['uses' => 'UsersController@ResetPassword']);

	Route::get('/Reset-User-Password/{user_email}',	['uses' => 'UsersController@SetNewPassword']);

	Route::get('lang/{lang}', 						['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
});	


Route::group(array('middleware' => 'auth'), function(){

	Route::get('/', function () {
	    return view('home', array('menu' => 'dashboard', 'submenu' => ''));
	});

	/**
	|--------------------------------------------------------------------------
	| Tasks
	|--------------------------------------------------------------------------
	*/

	Route::get('/Tasks', 						['uses' => 'TasksController@index']);

	Route::get('/Add-Task', 					['uses' => 'TasksController@create']);

	Route::post('/Save-Task', 					['uses' => 'TasksController@store']);

	Route::get('/Edit-Task/{task_id}', 			['uses' => 'TasksController@edit']);

	Route::post('/Update-Task/{task_id}', 		['uses' => 'TasksController@update']);

	Route::get('/Delete-Task/{task_id}', 		['uses' => 'TasksController@cancel']);

	Route::post('/Delete-Task/{task_id}', 		['uses' => 'TasksController@destroy']);

	Route::get('/Send-Task/{task_id}', 			['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Send-Task/{task_id}', 		['uses' => 'TasksController@scaleUp']);

	Route::get('/Approve-Task/{task_id}', 		['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Approve-Task/{task_id}', 		['uses' => 'TasksController@scaleUp']);
	
	Route::get('/Reject-Task/{task_id}', 		['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Reject-Task/{task_id}', 		['uses' => 'TasksController@scaleUp']);
	
	Route::get('/Authorize-Task/{task_id}', 	['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Authorize-Task/{task_id}', 	['uses' => 'TasksController@scaleUp']);
	
	Route::get('/Assign-Task/{task_id}', 		['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Assign-Task/{task_id}', 		['uses' => 'TasksController@scaleUp']);	

	Route::get('/Complete-Task/{task_id}', 		['uses' => 'TasksController@confirmScaleUp']);

	Route::post('/Complete-Task/{task_id}', 	['uses' => 'TasksController@scaleUp']);	

	Route::get('/View-Task-PDF/{task_id}', 		['uses' => 'TasksController@taskPDF']);
	

	/**
	|--------------------------------------------------------------------------
	| Users
	|--------------------------------------------------------------------------
	*/

	Route::get('/Users',                  		['uses' => 'UsersController@index']);

	Route::get('/Add-User', 					['uses' => 'UsersController@add']);

	Route::post('/Save-User', 					['uses' => 'UsersController@store']);

	Route::get('/Edit-User/{user_id}', 			['uses' => 'UsersController@edit']);

	Route::post('/Update-User/{user_id}', 		['uses' => 'UsersController@update']);

	Route::get('/Delete-User/{user_id}', 		['uses' => 'UsersController@delete']);

	Route::post('/Delete-User/{user_id}', 		['uses' => 'UsersController@destroy']);

	/**
	|--------------------------------------------------------------------------
	| Roles
	|--------------------------------------------------------------------------
	*/

	Route::get('/Roles',                  		['uses' => 'RolesController@index']);

	Route::get('/Add-Role', 					['uses' => 'RolesController@add']);

	Route::post('/Save-Role', 					['uses' => 'RolesController@store']);

	Route::get('/Edit-Role/{role_id}', 			['uses' => 'RolesController@edit']);

	Route::post('/Update-Role/{role_id}', 		['uses' => 'RolesController@update']);

	Route::get('/Delete-Role/{role_id}', 		['uses' => 'RolesController@delete']);

	Route::post('/Delete-Role/{role_id}', 		['uses' => 'RolesController@destroy']);

	/**
	|--------------------------------------------------------------------------
	| Task-Types
	|--------------------------------------------------------------------------
	*/

	Route::get('/Tasks-Types',                  ['uses' => 'TasksTypesController@index']);

	Route::get('/Add-Task-Type', 				['uses' => 'TasksTypesController@add']);

	Route::post('/Save-Task-Type', 				['uses' => 'TasksTypesController@store']);

	Route::get('/Edit-Task-Type/{type_id}', 	['uses' => 'TasksTypesController@edit']);

	Route::post('/Update-Task-Type/{type_id}', 	['uses' => 'TasksTypesController@update']);

	Route::get('/Delete-Task-Type/{type_id}', 	['uses' => 'TasksTypesController@delete']);

	Route::post('/Delete-Task-Type/{type_id}', 	['uses' => 'TasksTypesController@destroy']);
	
});

/**
	|--------------------------------------------------------------------------
	| About
	|--------------------------------------------------------------------------
	*/

Route::get('/About', function () {
	    
    if (Session::get('user_id') != '' ) {
    	return view('about', array('menu' => 'about', 'submenu' => '', 'active_session' => true));
    }
    return view('about',array('menu' => '', 'submenu' => '', 'active_session' => false));
});