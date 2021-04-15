<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class taskmodel extends  Model{

    protected $table='task';
    protected $primaryKey='taskID';
    protected $allowedFields=['phase','isActive','description'];
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