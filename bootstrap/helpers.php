<?php
function ajax_table_response($count,$data,$code=0,$msg='ok')
{
    return compact('code','msg','count','data');
}