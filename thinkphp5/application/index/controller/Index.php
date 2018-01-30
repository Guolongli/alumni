<?php
namespace app\index\controller;
use think\View;
use think\Controller;
use app\index\model\User;

class Index extends Controller
{
    public function index()
    {
        return view();
    }
    public function login($user_name,$user_pass)
    {
        return model('User')->login($user_name,$user_pass);
    }
}
