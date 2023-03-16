<?php

use Illuminate\Support\Facades\Route;

$prefix = 'dashboard.';

// Before Login Dashboard Routes
Route::group(['middleware' => 'guest:admin'], function () use ($prefix) {
    $controller = 'AuthController@';
    // Route Login
    Route::get('login', $controller . 'view')->name('dashboard.login');
    Route::post('login', $controller . 'login');

});


// After Login Dashboard Routes
Route::group(['middleware' => 'auth:admin'], function () use ($prefix) {
    // Logout Route
    Route::post('logout', 'AuthController@logout')->name($prefix . 'logout');

    // Home Route
    Route::get('/', 'HomeController@index')->name(substr($prefix, 0, -1));
    Route::get('home', 'HomeController@index')->name($prefix . 'home');
    Route::get('lang', 'SettingController@changeLang')->name($prefix .'lang');
    Route::get('/profile', 'HomeController@profile')->name($prefix .'profile');


    Route::get('/website', 'WebsiteController@index')->name($prefix . 'website');


    // Roles Route
    Route::group(['prefix' => 'roles'], function () {
        $controller = 'RoleController@';
        $route = 'dashboard.roles.';
        $permission = '-roles';
        Route::get('/', $controller . 'index')->name($route.'index');
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::get('/show/{id}', $controller . 'show')->name($route . 'show');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'destroy')->name($route . 'destroy');
        Route::post('deletes', $controller . 'destroyMulti')->name($route . 'destroy_multi');
    });



    // Admins Route
    Route::group(['prefix' => 'admins'], function () {
        $controller = 'AdminController@';
        $route = 'dashboard.admins.';
        $permission = '-admins';
        Route::get('/', $controller . 'index')->name($route. 'index');
        Route::get('create', $controller . 'create')->name($route . 'create');
        Route::post('store', $controller . 'store')->name($route . 'store');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'destroy')->name($route . 'destroy');
        Route::post('deletes', $controller . 'destroyMulti')->name($route . 'destroy_multi');
    });



    // Users Route
    Route::group(['prefix' => 'users'], function () {
        $controller = 'UserController@';
        $route = 'dashboard.users.';
        $permission = '-users';
        Route::get('/', $controller . 'index')->name($route. 'index');
        Route::get('{id}/show', $controller . 'show')->name($route . 'show');
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit');
        Route::post('{id}/update', $controller . 'update')->name($route . 'update');
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete');
        Route::post('deletes', $controller . 'destroy')->name($route . 'destroy');
        Route::get('delete-users', $controller . 'destroyMulti')->name($route . 'destroy_multi');
    });



});
