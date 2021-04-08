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
       return $builder->where(['isActive' => 1])->select('inhabitantID,firstname,lastname')->get()->getResultArray();

    }

    function getDoctors(){
        $builder= $this->db->table('doctor');
        return $builder->where(['isActive' => 1])->select('doctorID,firstname,lastname')->get()->getResultArray();

    }

    function insert_godparent(int $id)
    {

       return $this->db->query('INSERT INTO godparent (inhabitantID,isActive) values ('.$id.',true)');
    }
}
