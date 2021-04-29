<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class avatarModel extends  Model{

    protected $table='avatars';
    protected $primaryKey='id';
    protected $allowedFields=['title','location'];
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