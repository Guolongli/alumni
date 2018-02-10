<?php
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/10
 * Time: 12:01
 */

namespace app\index\model;


class Creator extends HandlerPro
{
    //创建者,对于项目进行管理
    public function __construct(Handler $object)
    {
        $this->object=$object;
    }

    public function createPro()
    {
        //创建项目(图片墙,事件,活动,圈子)
        $this->object->create();
    }

    public function editPro()
    {
        //编辑项目
    }

    public function delPro()
    {

    }

}