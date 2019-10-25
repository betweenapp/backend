<?php

Route::get('login', [
    'as' => 'auth.login',
    'namespace' => '',
    'uses' => 'Auth\Login@showLoginForm']);

Route::post('login', [
    'as' => 'auth.login',
    'uses' =>'Auth\Login@login']);
