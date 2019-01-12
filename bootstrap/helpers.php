<?php
function ajax_table_response($count,$data,$code=0,$msg='ok')
{
    return compact('code','msg','count','data');
}

function generate_appid()
{
    $chars = str_shuffle(str_repeat('0123456789', 3));
    $str =mt_rand(1,9).substr($chars, 0, 7);
    return $str;
}