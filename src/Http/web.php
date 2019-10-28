<?php

Route::get('{catchall?}', function () {
	return view('backend::layout');
})->where('catchall', '.*');

//Auth Routes
//Route::get('/login', 'Auth\Login@showLoginForm');
