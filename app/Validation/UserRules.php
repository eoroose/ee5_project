<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str,string $fields,array $data): bool
    {
        $model = new UserModel();
        $user=$model->where('username',$data['username'])->first();
        echo 'test';
        if(!$user){
            return false;
            echo 'false';}
            $check=password_verify($data['password'],$user['password']);
            echo print_r($check);
        return $check;
    }

    public function validateUserP(string $str,string $fields,array $data): bool
    {
        $model = new UserModel();
        $user=$model->where('username',$data['username'])->first();
        echo 'test';
        if(!$user){
            return false;
            echo 'false';}
            $check=password_verify($data['old-password'],$user['password']);
            echo print_r($check);
        return $check;
    }
}
