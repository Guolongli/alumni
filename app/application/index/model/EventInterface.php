<?php
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/11
 * Time: 21:21
 */

namespace app\index\model;


interface EventInterface extends ObjectInterface
{
    public function addition($title, $content, $writer, $state, $eid, $uid);
    public function edition($title, $content, $writer, $state, $eid, $uid);
}