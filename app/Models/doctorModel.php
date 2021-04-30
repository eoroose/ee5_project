<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class doctorModel extends  Model{

    protected $table='doctor';
    protected $primaryKey='doctorID';
    protected $allowedFields=['firstname','lastname','country','city','address','phoneNumber','gender','isActive'];
    protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

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