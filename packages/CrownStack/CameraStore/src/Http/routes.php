<?php

// API routes
Route::group(['prefix' => 'api'], function ($router) {
    Route::group(['namespace' => 'CrownStack\CameraStore\Http\Controllers\API'], function ($router) {
         
        Route::get('products', 'ResourceController@index')->defaults('_config', [
            'repository' => 'CrownStack\CameraStore\Repositories\ProductRepository',
            'resource'   => 'CrownStack\CameraStore\Http\Resources\Product'
        ]);

        Route::get('products/{id}', 'ResourceController@get')->defaults('_config', [
            'repository' => 'CrownStack\CameraStore\Repositories\ProductRepository',
            'resource'   => 'CrownStack\CameraStore\Http\Resources\Product'
        ]);

        Route::get('categories', 'ResourceController@index')->defaults('_config', [
            'repository' => 'CrownStack\CameraStore\Repositories\CategoryRepository',
            'resource'   => 'CrownStack\CameraStore\Http\Resources\Category'
        ]);

        Route::get('categories/{id}', 'ResourceController@get')->defaults('_config', [
            'repository' => 'CrownStack\CameraStore\Repositories\CategoryRepository',
            'resource'   => 'CrownStack\CameraStore\Http\Resources\Category'
        ]);

        //Customer and cart routes
        Route::post('customer/login', 'CustomerController@login');

        Route::post('customer/register', 'CustomerController@register');

        Route::group(['middleware' => ['jwt']], function() {
            Route::get('customer/get', 'CustomerController@getAuthenticatedUser');

            Route::get('customer/logout', 'CustomerController@logout');

            Route::post('cart/add/{product_id}', 'CartController@store');

            Route::get('cart', 'CartController@get');
        });
    });
});