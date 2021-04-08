<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends  Model{

    protected $table='user';
    protected $primaryKey='userID';
    protected $allowedFields=['firstname','lastname','username','password','updated_ad','birthday','isActive','gender'];
    protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
//are things he has to execute before inserting
       $data =$this->passwordHash($data);
       return $data;
    }
    protected function beforeUpdate(array $data)
    {
//are things he has to execute before updating
       $data =$this->passwordHash($data);
       return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['password']))
            $data['data']['password']=password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}