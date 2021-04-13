<?php namespace App\Models;

use CodeIgniter\Model;

class eventsModel extends  Model{

    protected $table='event';
    protected $primaryKey='eventsId';
    protected $allowedFields=['date','startTime','duration','description'];
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