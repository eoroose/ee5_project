<?php namespace App\Models;

use CodeIgniter\Model;

class inhabitantModel extends  Model{

    protected $table='inhabitant';
    protected $primaryKey='inhabitantID';
    protected $allowedFields=['userID','arrivalDate','halfwayDate','departureDate'];
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