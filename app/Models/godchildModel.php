<?php namespace App\Models;

use CodeIgniter\Model;

class godchildModel extends  Model{

    protected $table='godchild';
    protected $primaryKey='godChildID';
    protected $allowedFields=['inhabitantID','godParentID','isActive'];
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