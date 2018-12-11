<?php
use Illuminate\Support\Facades\Route;
Route::get('/',function (){
   return redirect('admin/index');
});
//获取验证码
Route::get('/captcha/{config?}', function ($config='default') {
    $captcha=app('captcha')->create($config,true);
    $key=str_random('8');
    cache()->tags('admin_captcha')->put($key,$captcha['key'],5);
    return response()->json([
        'key'=>$key,
        'img'=>$captcha['img']
    ]);
});
//登录页面
Route::get('login','LoginController@index')->name('admin.login.index');
Route::post('login','LoginController@store')->name('admin.login.store');
Route::get('index','IndexController@index')->name('admin.index.index');
Route::get('home/console','HomeController@console')->name('admin.home.console');

