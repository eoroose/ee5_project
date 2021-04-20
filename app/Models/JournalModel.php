<?php namespace App\Models;

use CodeIgniter\Model;

class JournalModel{

    private $db;

    public function __construct()
    {
       $this->db= \Config\Database::connect();
    }
    public function getWeekevents($date){
        $query_text="SELECT events.date , events.startTime, events.duration , events.description from events WHERE WEEK(:date:,1)=WEEK(events.date,1)";
        $query=$this->db->query($query_text,['date'=>$date]);
        return $query->getResultArray();
    }

    public function getMonthevents($date){
        $query_text="SELECT events.date , events.startTime, events.duration , events.description from events WHERE MONTH(:date:)=MONTH(events.date)";
        $query=$this->db->query($query_text,['date'=>$date]);
        return $query->getResultArray();
    }

    public function getMonthappoint($date,$id){
        $query_text="SELECT appointment.date, appointment.date, appointment.inhabitantID from appointment WHERE MONTH(:date:)=MONTH(appointment.date) and appointment.inhabitantID=:id:";
        $query=$this->db->query($query_text,['date'=>$date,'id'=>$id]);
        return $query->getResultArray();
        echo "works";
    }

    public function getWeekappoint($date,$id){
        $query_text="SELECT appointment.date, appointment.date, appointment.inhabitantID from appointment WHERE WEEK(:date:,1)=WEEK(appointment.date,1) and appointment.inhabitantID=:id:";
        $query=$this->db->query($query_text,['date'=>$date,'id'=>$id]);
        return $query->getResultArray();
    }

    public function getBetweendates($date1 , $date2, $id){
        $query_text="SELECT  appointment.date, appointment.inhabitantID from appointment WHERE appointment.date>=:date1: AND appointment.date<=:date2: and appointment.inhabitantID=:id:";
        $query=$this->db->query($query_text,['date1'=>$date1,'date2'=>$date2,'id'=>$id]);
        return $query->getResultArray();
    }

    protected function beforeInsert(array $data)
    {
//are things he has to execute before inserting
        return $data;
    }
    protected function beforeUpdate(array $data)
    {
//are things he has to execute before updating
        return $data;
    }

}