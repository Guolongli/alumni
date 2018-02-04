<?php
namespace app\index\validate;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:11',
        'pass' =>  'require|max:9',
    ];

}
?>