<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class customModel{
    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db=& $db;
    }

    function getActiveInhabitants(){
       $builder= $this->db->table('inhabitant');
       $builder->join('user','inhabitant.userID=user.userID');
       $builder->join('avatars','user.avatar=avatars.id');
       return $builder->where(['isActive' => 1])->select('inhabitantID,firstname,lastname,location')->get()->getResultArray();
    }

    function getDoctors(){
        $builder= $this->db->table('doctor');
        return $builder->where(['isActive' => 1])->select('doctorID,firstname,lastname')->get()->getResultArray();

    }

    function activateNewTask($id){
        $builder= $this->db->table('inhabitant');
        $builder->join('user','inhabitant.userID=user.userID');
        $result=$builder->where(['isActive' => 1])->select('inhabitantID')->get()->getResultArray();

        foreach($result as $row){
            $query_text="INSERT INTO `progress` ( `inhabitantID`, `taskID`, `status`, `isCompleted`) VALUES ( :inhabitant_id:, :id:, NULL, '0')";
            $this->db->query($query_text,['inhabitant_id'=>$row['inhabitantID'],'id'=>$id]);
        }
    }

    function newInhabitantProgress($inhabitant_id){
        $builder=$this->db->table('task');
        $result=$builder->where(['isActive'=>1])->select('taskID')->get()->getResultArray();
        foreach($result as $row)
        {
            $query_text="INSERT INTO `progress` ( `inhabitantID`, `taskID`, `status`, `isCompleted`) VALUES ( :inhabitant_id:, :id:, NULL, '0')";
            $this->db->query($query_text,['inhabitant_id'=>$inhabitant_id,'id'=>$row['taskID']]);
        }
    }
    function getCompletedTasksPhases($id)
    {
        $query_text="SELECT PHASE , COUNT(PHASE) AS Quantity FROM `progress` INNER JOIN task ON progress.taskID=task.taskID WHERE inhabitantID=:id: AND task.isActive=1 AND isCompleted=1 GROUP BY PHASE ORDER BY PHASE ASC";
        $query=$this->db->query($query_text,['id'=>$id]);
        return $query->getResultArray();
    }

    function getActiveTasks()
    {
        $query_text="SELECT PHASE , COUNT(PHASE) AS Quantity FROM `task` WHERE task.isActive=1 GROUP BY PHASE";
        $query=$this->db->query($query_text);
        return $query->getResultArray();
        return $result;
    }


}
