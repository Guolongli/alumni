<?php
namespace app\activity\controller;
use think\View;
use think\Controller;

class Index extends Controller
{
	public function index()
	{
		return view();
	}
	//活动发布页面

	public function publish()
	{
		if(request()->isPost())
		{	
			session_start();
			$organizers = $_SESSION['uid'];//用户id获取？

			$name = $this->request->param('name');
			$content = $this->request->param('content');
			$time = $this->request->param('time');
			
			$pubac = model('Activity')->publish($organizers, $name, $content, $time);
			if($pubac)
			{
				return $this->error("发布活动失败!");
			}
			else
			{
				$data = model('Activity')->newactivity($name);
				$aid = $data['id'];//获取活动id
				$gid = model('UserGroup')->getgid($organizers);//获取群组id
				$relate = model('Activity')->acgroup($aid, $gid);//将圈子id和活动id关联

				$this->assign('data', $data);
				return $this->fetch('index/activity');//最新活动数据返回
			}
		}
	}
	//活动发布及相关数据返回


}

?>