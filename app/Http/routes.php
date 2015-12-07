<?php

Route::get('/ping', 'PingController@ping');
Route::group(['prefix' => '/v1'], function(){
    Route::group(['prefix' => '/user/{user_id}'], function(){
        Route::get('/profile', 'UserController@profile');
    });
});
