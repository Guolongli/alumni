<?php
namespace app\activity\model;
use think\DB;
use think\Model;

class Activity extends Model
{	
	public $aid;

	public function publish($organizers, $name, $content, $time)
	{
		$sql = "insert into al_activity (organizers, name, content, time) values ('$organizers', '$name', '$content', '$time')";
		return Db::query($sql);
	}
	//活动数据插入数据库

	public function newactivity($name)
	{
		$sql = "select * from al_activity where name = '$name'";
		$result = Db::query($sql);
		$row = $result->fetch() 
		$this->aid = $row['id'];
		return $row;
	}
	//获取刚发布的活动数据

	public function acgorup($aid, $gid)
	{
		$sql = "insert into al_activity_group (aid, gid) values ('$aid', '$gid')";
		return Db::query($sql);
	}
	//将活动id和圈子id关联起来
}

?>