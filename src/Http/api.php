<?php


Route::post('login', 'Auth@login');
Route::resource('login', 'Auth')->except([
	'index', 'store', 'show', 'edit', 'update', 'destroy'
]);


Route::group([
	'prefix'=> '',
	'middleware' => ['auth:api']
], function () {

	Route::resource('users', 'Users');

});