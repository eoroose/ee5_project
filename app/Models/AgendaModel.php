<?php namespace App\Models;

use CodeIgniter\Model;

class AgendaModel{

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
        $query_text="SELECT concat('a', events.id) AS id, events.title, events.start, events.end from events WHERE MONTH(:date:)=MONTH(events.start)";
        $query=$this->db->query($query_text,['date'=>$date]);
        return $query->getResultArray();
    }

    public function getMonthappoint($date,$id){
        $query_text="SELECT appointment.date, appointment.date, appointment.inhabitantID from appointment WHERE MONTH(:date:)=MONTH(appointment.date) and appointment.inhabitantID=:id:";
        $query=$this->db->query($query_text,['date'=>$date,'id'=>$id]);
        return $query->getResultArray();
    }

    public function getWeekappoint($date,$id){
        $query_text="SELECT appointment.date, appointment.date, appointment.inhabitantID from appointment WHERE WEEK(:date:,1)=WEEK(appointment.date,1) and appointment.inhabitantID=:id:";
        $query=$this->db->query($query_text,['date'=>$date,'id'=>$id]);
        return $query->getResultArray();
    }

    public function insert($title, $date){
        $query_text="INSERT INTO events(title, start) VALUES (:title:, :start:)";
        $query=$this->db->query($query_text,['title'=>$title, 'start'=>$date]);
    }

    public function insert2($title, $date, $end){
        $query_text="INSERT INTO events(title, start, end) VALUES (:title:, :start:, :end:)";
        $query=$this->db->query($query_text,['title'=>$title, 'start'=>$date, 'end'=>$end]);
    }

    public function alterInDatabase($id, $start){
        $query_text="UPDATE events SET start = :start: WHERE id = :id:";
        $query=$this->db->query($query_text,['id'=>$id, 'start'=>$start]);
    }

    public function alterInDatabase2($id, $start, $end){
        $query_text="UPDATE events SET start = :start:, end = :end: WHERE id = :id:";
        $query=$this->db->query($query_text,['id'=>$id, 'start'=>$start, 'end'=>$end]);
    }

    public function getEvents($date1 , $date2){
        $query_text="SELECT concat('e', id) AS id, title, start, end, color from events WHERE (start BETWEEN :date1: AND :date2:)";
        $query=$this->db->query($query_text,['date1'=>$date1,'date2'=>$date2]);
        return $query->getResultArray();
    }

    public function getReccuringEvents(){
        $query_text="SELECT concat('r', id) AS groupId, title, startTime, endTime, color, daysOfWeek from recurringevents";
        $query=$this->db->query($query_text);
        return $query->getResultArray();
    }

    public function getReccuring($id){
        $query_text="SELECT daysOfWeek from recurringevents WHERE id = :id:";
        $query=$this->db->query($query_text, ['id'=>$id]);
        return $query->getResultArray();
    }


    public function getBirthdays($date1 , $date2){
        $query_text="SELECT concat('b', userID) AS id, concat(YEAR(CURRENT_DATE),SUBSTRING(birthday, 5, 6) ) AS start, concat('Birthday ', firstname) AS title FROM user WHERE (MONTH(birthday) BETWEEN (:date1:) AND (:date2:))";
        $query=$this->db->query($query_text,['date1'=>$date1,'date2'=>$date2]);
        return $query->getResultArray();
    }





    public function getAppointments($date1 , $date2, $id){
        $query_text="SELECT date AS start, concat('a', appointmentID) AS id from appointment WHERE (date BETWEEN :date1: AND :date2:) AND inhabitantID=:id:";
        $query=$this->db->query($query_text,['date1'=>$date1,'date2'=>$date2,'id'=>$id]);
        return $query->getResultArray();
    }


    public function addEvent($title,$start,$end,$color){
        $query_text = "INSERT INTO events (title, start, end, color) VALUES (:title:, :start:, :end:, :color:)";
        $this->db->query($query_text, ['title'=>$title, 'start'=>$start, 'end'=>$end, 'color'=>$color]);
        $e = 'e';
        return $e.$this->db->insertID();
    }

    public function addRecurringEvent($title,$start,$end,$color,$recur){
        $query_text = "INSERT INTO recurringevents (title, startTime, endTime, color, daysOfWeek) VALUES (:title:, :start:, :end:, :color:, :recur:)";
        $this->db->query($query_text, ['title'=>$title, 'start'=>$start, 'end'=>$end, 'color'=>$color, 'recur'=>$recur]);
        $e = 'r';
        return $e.$this->db->insertID();
    }

    public function addAppointment($start){
        $query_text = "INSERT INTO appointment (date) VALUES (:start:)";
        $this->db->query($query_text, ['start'=>$start]);
        $a = 'a';
        return $a.$this->db->insertID();
    }


    public function changeEvent($title,$start,$end,$id){
        $query_text = "UPDATE events SET title = :title:, start = :start:, end = :end: WHERE id = :id:";
        $this->db->query($query_text, ['title'=>$title, 'start'=>$start, 'end'=>$end, 'id'=>$id]);
    }

    public function changeAppointment($start,$id){
        $query_text = "UPDATE appointment SET date = :start: WHERE appointmentID = :id:";
        $this->db->query($query_text, ['start'=>$start, 'id'=>$id]);
    }

    public function removeEvent($id){
        $query_text = "DELETE FROM events WHERE id = :id:";
        $this->db->query($query_text, ['id'=>$id]);
    }

    public function removeAppointment($id){
        $query_text = "DELETE FROM appointment WHERE appointmentID = :id:";
        $this->db->query($query_text, ['id'=>$id]);
    }

    public function removeRecurring($id){
        $query_text = "DELETE FROM recurringevents WHERE id = :id:";
        $this->db->query($query_text, ['id'=>$id]);
    }


    public function addIdPrefix($queryResults, $prefix){

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