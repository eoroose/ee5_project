<?php namespace App\Models;

use CodeIgniter\Model;

class appointmentModel extends  Model{

    protected $table='appointment';
    protected $primaryKey='appointmentID';
    protected $allowedFields=['inhabitantID','doctorID','date','reason','isActive'];
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