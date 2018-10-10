<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/10
 * Time: 上午 10:23
 */

namespace app\index\model;

use think\Model;

//Teacher 模型

class TeacherModel extends Model
{
    // 设置当前模型对应的完整数据表名称,好像5.1必须指定表名?
    protected $table = 'Teacher';
}
