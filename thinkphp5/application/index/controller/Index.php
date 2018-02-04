<?php
namespace app\index\controller;
use think\View;
use think\Controller;
use app\index\model\User;
use think\Validate;

class Index extends Controller
{
    public function index()
    {
        return view();
    }
    //登陆界面
    public function login($user_name,$user_pass)
    {	
    	if (request()->isPost()) {
    		$data = model('User')->login($user_name,$user_pass);
		    if($data)
		    {
		        return $this->success("登陆成功",url('messagelist'));
		    }
		    else
		        return $this->error("登陆失败!");
    	}
 	}
 	//验证登陆
 	public function messagelist()
 	{
 		$alldata = model('Message')->alldata();
 		$this->assign('alldata',$alldata);
 		return $this->fetch('message/message');
 	}
 	//将所有数据返回至留言界面
 	public function registershow()
 	{
 		return $this->fetch('index/register');
 	}
 	public function register($user_name,$user_pass,$surepass)
 	{	
 		/*$data = [
            'name'  => '$user_name',
            'pass' => '$user_pass',
        ];

        $validate = new \app\index\validate\User;

        if (!$validate->check($data)) {
            dump($validate->getError());
        }
        else{*/
        	$sure = model('User')->register($user_name,$user_pass,$surepass);
		    if($sure)
		    {
		        return $this->error("注册失败!");
		    }
		    else
		       return $this->success("注册成功!",url('messagelist'));

        //}
 	}
 	//注册
}
