<?php
/**
 * @var $api \Dingo\Api\Routing\Router
 */
$api=app(\Dingo\Api\Routing\Router::class);
$api->version('v1',[
    'namespace'=>'App\Http\Controllers\Admin'
],function ($api){
    /**
     * @var $api \Dingo\Api\Routing\Router
     */
    //登录
    $api->post('authorizations','AuthorizationsController@store')
        ->name('admin.authorizations.store');
    //刷新当前token
    $api->put('authorizations/current','AuthorizationsController@update')
        ->name('admin.authorizations.update');
    // 删除token
    $api->delete('authorizations/current', 'AuthorizationsController@destroy')
        ->name('admin.authorizations.destroy');
});