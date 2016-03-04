<?php

Route::group(['prefix' => '/v1'], function(){
    Route::group(['prefix' => '/user/{user_id}', 'where' => ['user_id' => '[0-9]+']], function(){
        Route::get('/profile', 'UserController@profile');
        Route::resource('article', 'ArticleController',['only' => ['index', 'store']]);
        Route::resource('comment', 'CommentController',['only' => ['store']]);
    });
    Route::group(['prefix' => '/upload'], function(){
        Route::resource('/image', 'UploadController', ['only' => ['index', 'store']]);
    });
    Route::post('/login', 'AuthController@login');
    Route::get('/login', 'AuthController@login');
});

Route::get('/404', 'ErrorController@error');
Route::get('/ping', 'PingController@ping');

