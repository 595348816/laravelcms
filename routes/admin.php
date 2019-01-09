<?php
use Illuminate\Support\Facades\Route;
//登录
Route::post('login','AuthorizationsController@store')->name('admin.author.store');
Route::get('captchas','CaptchaSController@store')->name('admin.captchas.store');
//获取菜单列表
Route::get('menus','MenusController@index')->name('admin.menus.index');
//用户信息
Route::get('userInfo','SystemUserController@show')->name('admin.systemuser.show');


