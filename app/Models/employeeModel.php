<?php namespace App\Models;

use CodeIgniter\Model;

class employeeModel extends  Model{

    protected $table='employeeadmin';
    protected $primaryKey='employeeAdminID';
    protected $allowedFields=['userID','isAdmin'];
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