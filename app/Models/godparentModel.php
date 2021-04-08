<?php namespace App\Models;

use CodeIgniter\Model;

class godparentModel extends  Model{

    protected $table='godparent';
    protected $primaryKey='godParentID';
    protected $allowedFields=['inhabitantID','isActive'];
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