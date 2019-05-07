<?php

Route::group([
    'prefix' => config('clara.parameter.route.web.prefix'), 
    'middleware' => config('clara.parameter.route.web.middleware')
], 
function()
{
    Route::resource('parameter', 'CeddyG\ClaraParameter\Http\Controllers\Admin\ParameterController', ['names' => 'admin.parameter']);
});

Route::group([
    'prefix' => config('clara.parameter.route.api-admin.prefix'), 
    'middleware' => config('clara.parameter.route.api-admin.middleware')
], 
function()
{
    Route::get('parameter', 'CeddyG\ClaraParameter\Http\Controllers\Admin\ParameterController@indexAjax')->name('api.admin.parameter.index');
});