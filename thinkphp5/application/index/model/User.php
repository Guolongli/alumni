<?php
namespace app\index\model;
use think\DB;
use think\Model;


class User extends Model{

    public $user_id;
    public function login($user_name, $user_pass)
    {
        $sql = "select user_id from user where username = '$user_name' and password = '$user_pass'";
        return Db::query($sql);
    }
    public function register($user_name,$user_pass,$surepass)
    {
    	if ($user_pass==$surepass) {
    		$sql = "insert into user (username, password) values ('$user_name', '$user_pass')";
    		return Db::query($sql);
    	}
    }

}

?>