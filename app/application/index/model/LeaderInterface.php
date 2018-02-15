<?php
namespace app\index\model;
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/10
 * Time: 11:19
 */

interface Leader extends Handler
{
    public function addition();
    public function del();
    public function show();
}