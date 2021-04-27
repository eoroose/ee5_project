<?php namespace App\Models;

use CodeIgniter\Model;

class eventsModel extends  Model{

    protected $table='events';
    protected $primaryKey='id';
    protected $allowedFields=['start1','startTime','start','duration','title','endTime'];
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