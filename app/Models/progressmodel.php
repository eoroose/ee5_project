<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class progressmodel extends  Model{

    protected $table='progress';
    protected $primaryKey='progressID';
    protected $allowedFields=['inhabitantID','taskID','isCompleted','status','isCelebrated'];
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