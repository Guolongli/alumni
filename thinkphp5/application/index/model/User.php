<?php
namespace app\index\model;
use think\DB;
use think\Model;
use think\Controller;


class User extends Model{

    public function login($user_name, $user_pass)
    {
        //echo $user_name;
        //die();
        $sql1 = "select * from user where username = '$user_name'";
        $sql2 = "select * from user where password = '$user_pass'";
        if(Db::query($sql1))
        {
            if (Db::query($sql2)) {
                echo "登陆成功";
                return;
            }
            else
                {
                    echo "密码错误";
                    return;
                }

        }
        else
            {
                echo "该用户不存在!";
                return;
            }
    }

}

?>