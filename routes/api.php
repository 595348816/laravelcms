<?php
/**
 * @var $api \Dingo\Api\Routing\Router
 */
$api=app(\Dingo\Api\Routing\Router::class);
$api->version('v1',[
    'namespace'=>'App\Http\Controllers\Api',
],function ($api){
    $api->get('/', 'TestController@index')
        ->name('api.test.index');
    $api->post('/visa/login','VisaPayController@login')
        ->name('api.visa_pay.login');
    $api->post('/visa/payorder','VisaPayController@VisaPayOrder')
        ->name('api.visa_pay.payorder');
    $api->get('/visa/me','VisaPayController@me')
        ->name('api.visa_pay.me');
});