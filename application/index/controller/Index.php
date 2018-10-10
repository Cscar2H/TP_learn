<?php

namespace app\index\controller;

use think\Db;

class Index
{
    public function index()
    {
        //static方法'name',传入表名'Teacher';调用Db/query里的find方法查找第一条数据;
        var_dump(Db::name('Teacher')->find());
    }
}
