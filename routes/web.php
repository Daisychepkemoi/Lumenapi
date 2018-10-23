<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/', function() {
        return ['Fruits' => 'Delicious and healthy!'];
    }); 
// $api->group(['middleware' => 'auth:api'], function($api)
// {
    $api->get('/test', function() {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
	$api->post('/users/{id}/contacts', 'App\Http\Controllers\UserController@create');
	$api->get('/users/{id}/contacts/{contactid}', 'App\Http\Controllers\UserController@showSpecificContact');
	$api->put('/users/{id}/contacts/{contactid}', 'App\Http\Controllers\UserController@update');
	$api->delete('/users/{id}/contacts/{contactid}', 'App\Http\Controllers\UserController@destroy');
	$api->get('/users/{id}', 'App\Http\Controllers\UserController@show');
	$api->get('/users/{id}/contacts', 'App\Http\Controllers\UserController@showcontacts');
	
	// // //opportunities dsales executive
	$api->post('users/{id}/opportunities', 'App\Http\Controllers\SalesExecutiveOpportunityController@create');
	$api->get('users/{id}/opportunities', 'App\Http\Controllers\SalesExecutiveOpportunityController@index');
	$api->get('users/{id}/opportunities/{opportunityid}', 'App\Http\Controllers\SalesExecutiveOpportunityController@show');
	$api->put('users/{id}/opportunities/{opportunityid}', 'App\Http\Controllers\SalesExecutiveOpportunityController@update');
	$api->delete('users/{id}/opportunities/{opportunityid}', 'App\Http\Controllers\SalesExecutiveOpportunityController@destroy');
	//admincontroller
	$api->get('/users/admin/all', 'App\Http\Controllers\AdminController@index');
	$api->post('/users/admin', 'App\Http\Controllers\AdminController@create');
	$api->get('/users/admin/{id}', 'App\Http\Controllers\AdminController@show');
	$api->put('/users/admin/{id}', 'App\Http\Controllers\AdminController@update');
	$api->delete('/users/admin/{id}', 'App\Http\Controllers\AdminController@destroy');
	//salesexecutivemeetingsoppo
	///
	//
	$api->post('user/{id}/opportunities/{opportunityid}/meeting', 'SalesExecutiveMeetingsOppoController@create');
	$api->get('user/{id}/opportunities/{opportunityid}/meetings', 'App\Http\Controllers\SalesExecutiveMeetingsOppoController@index');
	$api->get('user/{id}/opportunities/{opportunityid}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingsOppoController@show');
	$api->put('user/{id}/opportunities/{opportunityid}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingsOppoController@update');
	$api->delete('user/{id}/opportunities/{opportunityid}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingsOppoController@destroy');

	//salesexecutivemeeting with a contact

	$api->get('users/{id}/meetings', 'App\Http\Controllers\SalesExecutiveMeetingController@index');
	$api->post('users/{id}/meetings', 'App\Http\Controllers\SalesExecutiveMeetingController@create');
	$api->get('users/{id}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingController@show');
	$api->put('users/{id}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingController@update');
	$api->delete('users/{id}/meetings/{idmeeting}', 'App\Http\Controllers\SalesExecutiveMeetingController@destroy');


// });
$api->post('/auth/login', 'App\Http\Controllers\AuthController@postLogin');

});
// Route::get('/contact/{id}', 'App\Api\Controllers\UserController@show');
