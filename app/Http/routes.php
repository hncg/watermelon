<?php

Route::get('/ping', 'PingController@ping');
Route::group(['prefix' => '/v1'], function(){
    Route::group(['prefix' => '/user/{user_id}', 'where' => ['user_id' => '[0-9]+'],'middleware' => 'cg'], function(){
        Route::get('/profile', 'UserController@profile');
    });
});
