<?php
namespace app\index\model;
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/8
 * Time: 22:41
 */

interface HandlerInterface
{
    //创建圈子
    public function createCircle();
    //加入圈子
    function joinCircle();
    //退出圈子
    public function exitCircle();
    //退出圈子
    public function showPro();
}