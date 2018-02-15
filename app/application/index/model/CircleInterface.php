<?php
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/12
 * Time: 9:41
 */

namespace app\index\model;


interface CircleInterface
{
    function joinCircle($uid);
    //加入圈子
    function exitCircle($uid);
    //退出圈子
    function createCircle($gname,$bake);
    //创建圈子
    function getCircleData();
    //获取圈子数据
    function getMemberData();
    //获取成员信息
    function changeIdentity($uid,$identity=0);
    //更改用户权限
}