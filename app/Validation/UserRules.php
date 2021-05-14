<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str,string $fields,array $data): bool
    {
        $model = new UserModel();
        $user=$model->where('username',$data['username'])->first();
        if(!$user){
            return false;}
        return password_verify($data['password'],$user['password']);
    }

    public function validate(string $str,string $fields,array $data): bool
    {
        $model = new UserModel();
        $user=$model->where('userId',session()->get('id'))->first();
        if(!$user){
            return false;}
        return password_verify($data['password'],$user['password']);
    }
    public function validateUserName(string $str,string $fields,array $data): bool
    {
        $model = new UserModel();
        $user=$model->where('username',$data['username'])->first();
        if(!$user){
            return true;
        }
        else{
            return false;
        }
    }
}
