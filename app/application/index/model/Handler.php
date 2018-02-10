<?php
namespace app\index\model;
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/8
 * Time: 22:41
 */

interface Handler
{
    public function initiateCircle();
    //发起圈子
    public function joinCircle();
    //加入圈子
    public function exitCircle();
    //退出圈子
    public function showPro();
}