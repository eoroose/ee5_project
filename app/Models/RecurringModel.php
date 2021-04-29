<?php namespace App\Models;

use CodeIgniter\Model;

class RecurringModel extends  Model{

    protected $table='recurringevents';
    protected $primaryKey='id';
    protected $allowedFields=['startTime','endTime','daysOfWeek','title'];
    protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
//are things he has to execute before inserting
        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        //test
//are things he has to execute before updating
        return $data;
    }

}