<?php

use Illuminate\Database\Seeder;

class SystemConfig extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestap=date('Y-m-d H:i:s');
        $data=[
            ['name'=>'sitename','sort'=>1,'type'=>'string','title'=>'网站标题','group'=>1,'value'=>'lethe后台管理','created_at'=>$timestap],
            ['name'=>'site_copy','sort'=>3,'type'=>'string','title'=>'版权信息','group'=>1,'value'=>'北京容艺教育科技有限公司','created_at'=>$timestap],
            ['name'=>'browser_icon','sort'=>2,'type'=>'image','title'=>'浏览器图标','group'=>1,'value'=>'http://lethe.item.test/favicon.ico','created_at'=>$timestap],
            ['name'=>'miitbeian','sort'=>4,'type'=>'string','title'=>'网站备案','group'=>1,'value'=>'京ICP备15018568号-1','created_at'=>$timestap],
            ['name'=>'file_type','sort'=>5,'type'=>'string','title'=>'文件上传类型','group'=>1,'value'=>'png|gif|jpg|jpeg|zip|rar','created_at'=>$timestap],
        ];
        \App\Models\SystemConfig::insert($data);
    }
}
