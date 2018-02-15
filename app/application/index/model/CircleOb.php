<?php
/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/10
 * Time: 14:11
 */

namespace app\index\model;


use think\Db;


class CircleOb implements CircleInterface
{
    private $circleTable;
    private $memberTable;
    private $gid;

    public function __construct($gid = null)
    {
        if (empty($gid)) {
            $this->gid = false;
        } else {
            $this->gid = $gid;
        }
        $this->memberTable = "al_user_group";
        //圈子成员信息表
        $this->circleTable = "al_group";
        //圈子信息表
    }

    public function getCircleData()
    {
        if ($this->gid) {
            $result = Db::query("select :source0.* from :source0 where gid=:gid", [
                "source0" => $this->circleTable,
                "gid" => $this->gid
            ]);
            return $result;
        } else {
            return false;
        }
    }

    public function getMemberData()
    {
        if ($this->gid) {
            $result = Db::query("select :source0.* from :source0 where gid=:gid", [
                "source0" => $this->memberTable,
                "gid" => $this->gid
            ]);
            return $result;
        } else {
            return false;
        }

    }

    public function exitCircle($uid)
    {
        if (!empty($uid) && !($this->gid)) {
            Db::query("delete from :source0 where gid=:gid and uid=:uid", [
                "gid" => $this->gid,
                "uid" => $uid,
                "source0" => $this->memberTable
            ]);
            return true;
        } else {
            return false;
        }

    }

    public function createCircle($gname, $bake)
    {
        if (!empty($gname)){
            Db::query("insert into :source0 (gname,bake,create_time)VALUES (:gname,:bake,now())",[
                "source0"=>$this->circleTable,
                "bake"=>$bake,
                "gname"=>$gname
            ]);
            return true;
        }else{
            return false;
        }
    }

    public function joinCircle($uid)
    {
        if ($this->gid){
            Db::query("insert into (uid,gid,identity,join_time)VALUES (:uid,:gid,0,now())",[
                "uid"=>$uid,
                "gid"=>$this->gid
            ]);
            return true;
        }else{
            return false;
        }
    }
    public function changeIdentity($uid, $identity = 0)
    {
        if ($this->gid&&!empty($uid)){
            Db::query("update :source0 set identity=:identity where uid=:uid and gid=:gid",[
                "source0"=>$this->memberTable,
                "gid"=>$this->gid,
                "uid"=>$uid
            ]);
            return true;
        }else{
            return false;
        }
    }
}