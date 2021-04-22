<?php namespace App\Models;

use CodeIgniter\Model;

class yellowCardModel extends  Model{

    protected $table='yellowcard';
    protected $primaryKey='yellowCardID';
    protected $allowedFields=['employeeAdminID','inhabitantID','reason','date','isActive'];
    protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        return $data;
    }

}