<?php

namespace app\index\model;

use Think\Db;
use think\Model;

/**
 * Created by PhpStorm.
 * User: 17715
 * Date: 2018/2/8
 * Time: 23:02
 */
class EventPro extends Model
{
    public function __construct($eventId = null)
    {
        parent::__construct();
        $this->eventTable = "al_event";
        //事件信息表
        $this->writerTable = "al_event_user";
        //事件创建者表
        $this->eventId = $eventId;

    }

    public function addition($title, $content, $writer, $state, $eid, $uid)
    {
        //添加事件
        Db::query("insert into :table (title,content,createTime,witter,state)VALUES (:title,:content,now(),:writer,:state)", [
            "title" => $title,
            "content" => $content,
            "writer" => $writer,
            "state" => $state,
            "table" => $this->eventTable,
        ]);
        Db::query("insert into :source (eid,uid,praise)VALUES(:eid,:uid,:praise)", [
            "eid" => $eid,
            "uid" => $uid,
            "praise" => 0,
            "source" => $this->writerTable
        ]);
        return true;
    }

    public function edition($title, $content, $writer, $state, $eid, $uid)
    {
        //编辑事件
        $result = $this->show();
        if (!empty($result)) {
            Db::query("update :source set title=:title,content=:content,writer=:writer,state=:state WHERE id=:eventId", [
                "source" => $this->eventTable,
                "title" => $title,
                "content" => $content,
                "writer" => $writer,
                "eventId" => $this->eventId,
                "state" => $state
            ]);
            Db::query("update :source set eid=:eid,uid=:uid where id=:writerId", [
                "source" => $this->writerTable,
                "eid" => $eid,
                "uid" => $uid,
                "writerId" => $writer["writer"]
            ]);
        }

    }

    public function del()
    {
        //删除事件
        $result = $this->show();
        if (!$result) {
            $writerId = $result["writer"];
            Db::query("delete from :source where id=:id", [
                "source" => $this->eventTable,
                "id" => $this->eventId
            ]);
            Db::query("delete from :source where id=:id", [
                "source" => $this->writerTable,
                "id" => $writerId
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function show()
    {//得到指定数据
        $result = Db::query("select :source1.*,:source2.* from :source1,:source2 WHERE (:source1.writer=:source2.id) AND (:source1.id=:id)", [
            "id" => $this->eventId,
            "source1" => $this->eventTable,
            "source2" => $this->writerTable,
        ]);
        return $result;
    }

    public function praise()
    {
        //评价事件
        $result=$this->show();
        Db::query("update :source set praise=:praise WHERE id=:eventId",[
            "eventId"=>$this->eventId,
            "praise"=>$this->praise()+1
        ]);
    }
}