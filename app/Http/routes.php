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
    Route::get('/register_by_3_err', 'ErrorController@register_by_3_err');
    Route::get('/login_by_3', 'AuthController@login_by_3');
    Route::get('/register_by_openid', 'AuthController@register_by_openid');
    Route::get('/login_by_3_callback', 'AuthController@login_by_3_callback');
});

Route::get('/404', 'ErrorController@error');
Route::get('/ping', 'PingController@ping');

