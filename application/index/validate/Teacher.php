<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/10
 * Time: 下午 3:10
 */

namespace app\index\validate;

use think\Validate;

class Teacher extends Validate
{
    protected $rule = [
        'username' => 'require|unique:teacher|length:4,25',
        'name'  => 'require|length:2,25',
        'sex' => 'in:0,1',
        'email' => 'email',
    ];
}