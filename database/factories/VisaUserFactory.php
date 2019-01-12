<?php
use Faker\Generator as Faker;

$factory->define(\App\Models\VisaUser::class,function (Faker $faker){
    static $password;
    $mobile=$faker->phoneNumber;
    $time=$faker->dateTime;
    return [
        'mobile'=>$mobile,
        'password'=>$password ?:$password=bcrypt('123456'),
        'appid'=>generate_appid(),
        'appsecret'=>sha1(str_random(32).$mobile),
        'created_at'=>$time,
        'updated_at'=>$time
    ];
});