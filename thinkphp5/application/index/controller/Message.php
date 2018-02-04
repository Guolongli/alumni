<?php
namespace app\index\controller;
use think\View;
use think\Controller;
use app\index\model\User;
use think\facade\Request;

class Message extends Controller
{
	public function deleteme()
	{
		$message_id = $this->request->param('message_id'); 
		$result = model('Message')->deleteme($message_id);
		if($result)
		{
			return $this->error("删除失败！");
		}
		else
			return $this->success("删除成功！", url('index/index/messagelist'));
	}
	//删除留言

	public function publish()
	{
		return $this->fetch('message/publish');
	}
	//发布页面
	public function surepublish($title, $content)
	{
		if (request()->isPost()) {
    		$sure = model('Message')->surepublish($title, $content);
		    if($sure)
		    {
		        return $this->error("发表失败");
		    }
		    else
		        return $this->success("发表成功!", url('index/index/messagelist'));
    	}
	}
	//发表留言
	public function detail()
	{
		$message_id = $this->request->param('message_id');
		$data = model('Message')->detail($message_id);
		$this->assign('data',$data);
 		return $this->fetch('message/detail');
	}

}


?>