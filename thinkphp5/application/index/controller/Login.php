<?php
namespace app\index\controller;
use think\View;
use think\Controller;
use app\index\model\User;

class Login extends Controller
{
    public function index()
    {
        return view();
    }

    public function login($user_name,$user_pass)
    {
        //echo $user_name;
        //echo $user_pass;
        //die();
        $surelogin = new User;
        $status = $surelogin->login($user_name,$user_pass);
        if($status==1)
        {
            return $this->success('登陆成功','https://www.baidu.com/');
        }
        if ($status==2) {
            return $this->error('密码错误!');
        }
        if ($status==3) {
            return $this->error('该用户不存在!');
        }
    }

}

?>

