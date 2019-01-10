<?php
use Illuminate\Support\Facades\Route;
//登录
Route::post('login','AuthorizationsController@store')->name('admin.author.store');
Route::get('captchas','CaptchaSController@store')->name('admin.captchas.store');
//获取菜单列表
Route::get('menus','MenusController@index')->name('admin.menus.index');
Route::group([
    'middleware'=>['auth:admin']
],function (){
    //返回管理员信息
    Route::get('userInfo','SystemUserController@show')
        ->name('admin.systemuser.show');
    //修改管理员密码
    Route::post('password','SystemUserController@editPassword')
        ->name('admin.systemuser.editpassword');
});



