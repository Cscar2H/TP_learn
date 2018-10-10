<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/10
 * Time: 上午 10:10
 */

namespace app\index\controller;
//命名空间
/*use think\Db;   //数据库操作类*/

use app\index\model\TeacherModel;
use think\Controller;
use think\facade\Request;


class Teacher extends Controller
{
    public function index()
    {
        /*//获取教师表中的所有数据
        $Teacher = Db::name('Teacher')->select();
        //var_dump 可以打印数组,字符串
        var_dump($Teacher[0]);
        //echo 只能打印字符串,不能打印数组
        echo ($Teacher[0]['name']);*/

        /*$t = new TeacherModel(); //teach模型对象
        $Teacher = $t->select();    //查询赋值
        var_dump($Teacher); //打印

        $Teacher = $Teacher[0];

        //三种直接显示数据的方式
        var_dump($Teacher->getData('name'));
        echo $Teacher->getData('name');
        return $Teacher->getData('name');*/

        $T = new TeacherModel();
        $teacherAll = $T->select();

        // 向V层传数据
        $this->assign('teacher', $teacherAll);
        // 取回打包后的数据
        $html = $this->fetch();
        /*$teacher1 = $teacherAll[0];
        var_dump($teacher1->getData());*/

        // 将数据返回给用户
        return $html;

    }

    public function insert()
    {
        /*// 新建测试数据
        $teacher = array();
        $teacher['name'] = '王五';
        $teacher['username'] = 'wangwu';
        $teacher['sex'] = '1';
        $teacher['email'] = 'wangwu@eamil.com';
        var_dump($teacher);

        // 引用teacher数据表对应的模型
        $T = new TeacherModel();

        // 向teacher表中插入数据并判断是否插入成功
        $T->data($teacher)->save();
        return $teacher['name'] . '已经成功加入数据表';*/

        // 接收传入数据
        $postData = Request::instance()->post();
        /*$postData = $this->request->post();*/

        //从TeacherModel中实例化对象
        $T = new TeacherModel();

        // 为对象的属性赋值
        $T->name = $postData['name'];
        $T->username = $postData['username'];
        $T->sex = $postData['sex'];
        $T->email = $postData['email'];

        /*// T对象调用save方法插入数据
        $T->save();*/

        //新增对象至数据表
        /*$result = $T->validate(true)->save($T->getData());*/
        $result = $this->validate($T, 'app\index\validate\Teacher');
        /*$result = $this->validate($T,'app\index\validate\TeacherModel')->save($T->getData());*/

        //返回结果
        /*if (false === $result) {
            return '添加失败:' . $T->getError();
        } else {
            return $T->name . '已经成功加入数据表.新增id为:' . $T->id;
        }*/
        if (true !== $result) {
            dump($result);
        } else {
            $T->save();
            return $T->name . '已经成功加入数据表.新增id为:' . $T->id;
        }
    }

    public function add()
    {
        $html = $this->fetch();
        return $html;
    }

    public function delete()
    {
        /*// 从模型中获取要删除的对象(删除单一记录)
        $T = TeacherModel::get(4);

        //判断删除的对象
        if (!is_null($T)) {
            //删除对象
            if ($T->delete()) {
                return '删除成功';
            } else {
                return '删除失败';
            }
        }
        return '删除失败';*/

        // 直接删除相关关键字记录(批量删除)
        $testArr = array(6,9);
        if ($state = TeacherModel::destroy($testArr)) {
            return '成功删除' . count($testArr) . '条数据';
        }
        return '删除失败';
    }

    public function test()
    {
        $data = array();
        $data['username'] = '13222';
        $data['name'] = '11122221';
        $data['sex'] = '1';
        $data['email'] = 'h1@mail.com';
        var_dump($this->validate($data, 'Teacher'));
        $T = new TeacherModel();
        $T->data($data)->save();
    }
}