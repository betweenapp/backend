<?php

Route::get('/', 'Dashboard@index');

//Auth Routes
Route::get('/login', 'Auth\Login@showLoginForm');
