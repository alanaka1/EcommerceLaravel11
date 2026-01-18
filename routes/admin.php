<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'role:admin']], function() {
    
    Route::group(['prefix' => 'category', 'as' => 'category.', 'controller' => CategoryController::class], function() {
        Route::get('/', 'index')->name('index');
        Route::get('form', 'create')->name('create');
        Route::any('form/store', 'store')->name('store');
        Route::get('form/edit/{id}', 'edit')->name('edit');
        Route::any('form/update', 'update')->name('update');


    });
});