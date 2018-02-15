<?php
namespace app\activity\model;
use think\DB;
use think\Model;

class UserGroup extends Model
{
	public $gid;

	public function getgid($uid)
	{
		$sql = "select select gid from al_user_group where uid = '$uid'";
		$result = Db::query($sql);
		$row = $result->fetch();
		$this->gid = $row['gid'];
		return $this->gid;
	}

}
?>