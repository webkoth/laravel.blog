<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'MainController@index')->name('admin.index');
        Route::resource('/categories', 'CategoryController')->except('show');
        Route::resource('/tags', 'TagController')->except('show');
        Route::resource('/posts', 'PostController');
});
