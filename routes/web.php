<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('ajax-form-submit', 'FormController@index');
Route::post('save-form', 'FormController@store');
