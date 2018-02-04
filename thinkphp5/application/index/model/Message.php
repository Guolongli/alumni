<?php
namespace app\index\model;
use think\DB;
use think\Model;

class Message extends Model
{
	public function alldata()
	{
		$sql = "select * from message";
		return Db::query($sql);
	}
	//所有留言信息
	public function deleteme($message_id)
	{
		$sql = "delete from message where message_id = '$message_id'";
		return Db::query($sql);
	}
	public function surepublish($title, $content)
	{
		$sql = "insert into message (title, content) values ('$title', '$content')";
		return Db::query($sql);
	}
	public function detail($message_id)
	{
		$sql = "select * from message where message_id = '$message_id'";
		return Db::query($sql);
	}
}

?>